<?php

/**
 * @Author: Eden
 * @Date:   2019-01-09 12:52:11
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-27 10:29:04
 */
use App\Models\User;

return [
	// 页面标题
	'title' => '用戶',

	// 模型单数，用作页面「新建 $single」
	'single' => '用戶',

	// 数据模型
	'model' => User::class,

	// 设置当前页面的访问权限
	'permission' => function()
	{
		return Auth::user()->can('manage_users');
	},

	// 字段渲染
	'columns' => [
		'id',

		'avatar' => [
			'title' => '頭像',
			// 默认情况直接输出数据，可是使用 output 选项来定制输出内容
			'output' => function($avatar, $model)
			{
				return empty($avatar) ? 'N/A' : '<img src="'.$avatar.'" width="40">';
			},

			// 是否允许排序
			'sortable' => false,
		],

		'name' => [
			'title' => '用戶名',
			'sortable' => false,
		],
		'email' => [
			'title' => '郵箱',
		],
		'code' => [
			'code' => '區號',
		],
		'phone' => [
			'phone' => '電話'
		],
		'roles' => [
			'title' => '角色',
			'output' => function ($value, $model) {
				$model->load('roles');
				$result = [];
				foreach ($model->roles as $role) {
					$result[] = $role->name; 
				}
			return empty($result) ? 'N/A' : $result;
			},
			'sortable' => false,
		],
		'school' => [
			'title' => '關聯學校名稱',
			'output' => function ($value, $model) {
				return empty($model->school->school_name) ? 'N/A' : $model->school->school_name;
			}
		],
		'travels' => [
			'title' => '旅遊項目',
			'output' => function ($value, $model) {
				$model->load('travels');
				$result = [];
				foreach ($model->travels as $travel) {
					$result[] = $travel->travel_name;
				}
				return empty($result) ? 'N/A' : implode($result, ' | ');
			},
			'sortable' => false,
		],

		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],
	// 模型表单设置项
	'edit_fields' => [
		'name' => [
			'title' => '用戶名',
		],
		'email' => [
			'title' => '郵箱',
		],
		'code' => [
			'code' => '區號',
		],
		'phone' => [
			'phone' => '電話',
		],
		'avatar' => [
			'title' => '用戶頭像',
			'type' => 'image',
			// 图片上传路径
			'location' => public_path() . '/uploads/images/avatars/'
		],
		'roles' => [
			'title' => '用戶角色',
			// 指定数据为关联模型
			'type' => 'relationship',
			// 关联模型的字段，用来做关联显示
			'name_field' => 'name',
		],
		'school' => [
			'title' => '關聯學校名稱',
			'type' => 'relationship',
			'name_field' => 'school_name',
		],
		'travels' => [
			'title' => '旅遊項目',
			'type' => 'relationship',
			'name_field' => 'travel_name',
		],
	],


	'filters' => [
		'id' => [
			// 过滤表单显示条目
			'title' => 'ID'
		],
		'name' => [
			'title' => '用戶名'
		],
		'email' => [
			'title' => '郵箱'
		],
		'phone' => [
			'phone' => '電話'
		],
	],























];























