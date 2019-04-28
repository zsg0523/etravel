<?php

/**
 * @Author: Eden
 * @Date:   2019-01-10 10:11:36
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-23 10:45:04
 */
use App\Models\Areacode;

return [

	'title' => '区号选择',
	'single' => '区号',
	'model' => Areacode::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
			'sort_field' => 'order_number',
		],
		'acname_en' => [
			'title' => '英文名',
		],
		'acname_cn' => [
			'title' => '中文名',
		],
		'codename' => [
			'title' => '代号',
		],
		'acnumber' => [
			'title' => '区号',
		],
		'order_number' => [
			'title' => '排序',
		],
		'show' => [
			'title' => '是否显示',
			'select' => "IF((:table).show, '显示', '不显示')"
		],
		'operation' => [
			'title' => '管理',
		],
	],

	'edit_fields' => [
		'acname_en' => [
			'title' => '英文名',
		],
		'acname_cn' => [
			'title' => '中文名',
		],
		'codename' => [
			'title' => '代号',
		],
		'acnumber' => [
			'title' => '区号',
		],
		'order_number' => [
			'title' => '排序',
			'hint' => '数值越大，选项卡里出现越早'
		],
		'show' => [
			'type' => 'bool',
			'title' => '是否显示',
			'hint' => '选项卡是否需要显示'
		],
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'acname_cn' => [
			'title' => '中文名',
		],
		'codename' => [
			'title' => '代号',
		],
	],

	'rules' => [
		'acname_en' => 'required',
		'acname_cn' => 'required',
		'codename' => 'required',
		'acnumber' => 'required',
	],

	'messages' => [
        'acname_en.required' => '英文名不能为空',
        'acname_cn.required' => '中文名不能为空',
        'codename.required' => '代号不能为空',
        'acnumber.required' => '区号不能为空',
    ],

];