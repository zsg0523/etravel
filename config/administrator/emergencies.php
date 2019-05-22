<?php
use App\Models\Emergency;

return [

	'title' => '緊急聯繫人管理',

	'single' => '緊急聯繫人管理',

	'model' => Emergency::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'user' => [
			'title' => '所屬',
			'sortable' => false,
			'output' => function ($value, $model) {
				return !empty($model->user->name) ? "用戶：".$model->user->name : "旅遊團：".$model->travel->travel_name;
			},

		],
		'code_one' => [
			'title' => '區號A',
		],
		'emergency_phone_one' => [
			'title' => '電話A',
		],
		'emergency_email_one' => [
			'title' => '郵箱A',
		],
		'code_two' => [
			'title' => '區號B',
		],
		'emergency_phone_two' => [
			'title' => '電話B',
		],
		'emergency_email_two' => [
			'title' => '郵箱B',
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
			'title' => '區號A',
		],
		'emergency_phone_one' => [
			'title' => '電話A',
		],
		'emergency_email_one' => [
			'title' => '郵箱A',
		],
		'code_two' => [
			'title' => '區號B',
		],
		'emergency_phone_two' => [
			'title' => '電話B',
		],
		'emergency_email_two' => [
			'title' => '郵箱B',
		],
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
	],
];