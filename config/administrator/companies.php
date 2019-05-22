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
			'title' => '公司名稱'
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
			'title' => '公司名稱'
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