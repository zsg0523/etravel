<?php

/**
 * @Author: Eden
 * @Date:   2019-01-11 12:25:04
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-14 15:24:18
 * 记录 - 通过中间件过滤用户请求，记录用户访问时间到 redis 按日期区分的哈希表
 * 同步 - 新建命令，计划任务每天运行一次此命令，将昨日哈希表的数据同步到数据库中，并删除
 * 读取 - 优先读取当日哈希表里 Redis 的数据，如果没有则使用数据库的数据
 */
namespace App\Models\Traits;

use Redis;
use Carbon\Carbon;

trait LastActivedAtHelper
{
	// 缓存相关
    protected $hash_prefix = 'etravels_last_actived_at_';
    protected $field_prefix = 'user_';

    public function recordLastActivedAt()
    {
        // 获取今天的日期
        $date = Carbon::now()->toDateString();

        // Redis 哈希表的命名，如：larabbs_last_actived_at_2017-10-21
        $hash = $this->hash_prefix . $date;

        // 字段名称，如：user_1
        $field = $this->field_prefix . $this->id;

        // dd(Redis::hGetAll($hash));

        // 当前时间，如：2017-10-21 08:35:15
        $now = Carbon::now()->toDateTimeString();

        // 数据写入 Redis ，字段已存在会被更新
        Redis::hSet($hash, $field, $now);
    }

    public function syncUserActivedAt()
    {
    	// 获取昨天的日期
    	$yesterday_date = Carbon::yesterday()->toDateString();

    	// Redis 哈希表的命名
    	$hash = $this->hash_prefix . $yesterday_date;

    	// 从 Redis 表里获取数据
    	$dates = Redis::hGetAll($hash);

    	// 遍历并同步到数据库中
    	foreach ($dates as $user_id => $actived_at) {
    		// 将 user_1 替换成 1
    		$user_id = str_replace($this->field_prefix, '', $user_id);

    		// 用户存在时将数据写入数据库
    		if ($user = $this->find($user_id)) {
    			$user->last_actived_at = $actived_at;
    			$user->save();
    		}
    	}

    	// 同步后删除 Reids 数据
    	Redis::del($hash);
    }

    /** [getLastActivedAtAttribute 访问器 ] */
    public function getLastActivedAtAttribute($value)
    {
    	// 获取今天的日期
    	$date = Carbon::now()->toDateString();

    	// 哈希表名称
    	$hash = $this->hash_prefix . $date;

    	// 字段名称
    	$field = $this->field_prefix . $this->id;

    	// 优先选择 Redis 的数据,否则读取数据库的数据
    	$datetime = Redis::hGet($hash, $field) ? : $value;

    	if ($datetime) {
    		return new Carbon($datetime);
    	} else {
    		// 使用用户注册时间
    		return $this->created_at;
    	}
 

    }

























}