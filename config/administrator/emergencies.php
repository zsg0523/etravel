<?php
use App\Models\Emergency;
use App\Models\Areacode;

return [

	'title' => '紧急联系人管理',

	'single' => '紧急联系人管理',

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
		'emergency_phone_one' => [
			'title' => '电话A',
		],
		'emergency_email_one' => [
			'title' => '邮箱A',
		],
		'code_two' => [
			'title' => '区号B',
		],
		'emergency_phone_two' => [
			'title' => '电话B',
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
		'user' => [
			'title' => '用户名称',
			'type' => 'relationship',
		],
		'travel' => [
			'title' => '旅游团名称',
			'type' => 'relationship',
			'name_field' => 'travel_name',
		],
		'code_one' => [
			'title' => '区号A',
			'output' => function ($value, $model) {
				dd(Areacode::all());
				// return $model->areacode;
			},
		],
		'emergency_phone_one' => [
			'title' => '电话A',
		],
		'emergency_email_one' => [
			'title' => '邮箱A',
		],
		'code_two' => [
			'title' => '区号B',
		],
		'emergency_phone_two' => [
			'title' => '电话B',
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