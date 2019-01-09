<?php

/**
 * @Author: Eden
 * @Date:   2019-01-09 12:52:11
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-09 16:25:21
 */
use App\Models\User;

return [
	// 页面标题
	'title' => '用户',

	// 模型单数，用作页面「新建 $single」
	'single' => '用户',

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
			'title' => '头像',
			// 默认情况直接输出数据，可是使用 output 选项来定制输出内容
			'output' => function($avatar, $model)
			{
				return empty($avatar) ? 'N/A' : '<img src="'.$avatar.'" width="40">';
			},

			// 是否允许排序
			'sortable' => false,
		],

		'name' => [
			'title' => '用户名',
			'sortable' => false,
		],
		'email' => [
			'title' => '邮箱',
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],
	// 模型表单设置项
	'edit_fields' => [
		'name' => [
			'title' => '用户名',
		],
		'email' => [
			'title' => '邮箱',
		],
		'password' => [
			'title' => '密码',
			'type' => 'password',
		],
		'avatar' => [
			'title' => '用户头像',
			'type' => 'image',
			// 图片上传路径
			'location' => public_path() . '/uploads/images/avatars/'
		],
		'roles' => [
			'title' => '用户角色',
			// 指定数据为关联模型
			'type' => 'relationship',
			// 关联模型的字段，用来做关联显示
			'name_field' => 'name',
		],
	],


	'filters' => [
		'id' => [
			// 过滤表单显示条目
			'title' => '用户 ID'
		],
		'name' => [
			'title' => '用户名'
		],
		'email' => [
			'title' => '邮箱'
		],
	],























];























