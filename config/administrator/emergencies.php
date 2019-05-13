<?php
use App\Models\Emergency;

return [

	'title' => '紧急联系人',

	'single' => '紧急联系人',

	'model' => Emergency::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'user' => [
			'title' => '所属',
			'sortable' => false,
			'output' => function ($value, $model) {
				return !empty($model->user->name) ? "用户：".$model->user->name : "旅游团：".$model->travel->travel_name;
			},

		],
		'code_one' => [
			'title' => '区号A',
		],
		'code_two' => [
			'title' => '区号B',
		],
		'emergency_phone_one' => [
			'title' => '电话A',
		],
		'emergency_phone_two' => [
			'title' => '电话B',
		],
		'emergency_email_one' => [
			'title' => '邮箱A',
		],
		'emergency_email_two' => [
			'title' => '邮箱B',
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'code_one' => [
			'title' => '区号A',
		],
		'code_two' => [
			'title' => '区号B',
		],
		'emergency_phone_one' => [
			'title' => '电话A',
		],
		'emergency_phone_two' => [
			'title' => '电话B',
		],
		'emergency_email_one' => [
			'title' => '邮箱A',
		],
		'emergency_email_two' => [
			'title' => '邮箱B',
		],
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
	],
];