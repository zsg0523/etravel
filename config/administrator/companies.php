<?php
use App\Models\Company;

return [

	'title' => '公司信息管理',

	'single' => '公司信息管理',

	'model' => Company::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'name' => [
			'title' => '公司名称'
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
		'show' => [
			'title' => '是否使用',
			'select' => "IF((:table).show, '使用', '不使用')"
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'name' => [
			'title' => '公司名称'
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
		'show' => [
			'type' => 'bool',
			'title' => '是否使用',
			'hint' => '是否需要使用该公司信息'
		],
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
	],
];