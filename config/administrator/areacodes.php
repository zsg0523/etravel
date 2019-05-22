<?php

/**
 * @Author: Eden
 * @Date:   2019-01-10 10:11:36
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 10:16:36
 */
use App\Models\Areacode;

return [

	'title' => '區號選擇',
	'single' => '區號',
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
			'title' => '代號',
		],
		'acnumber' => [
			'title' => '區號',
		],
		'order_number' => [
			'title' => '排序',
		],
		'show' => [
			'title' => '是否顯示',
			'select' => "IF((:table).show, '顯示', '不顯示')"
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
			'title' => '代號',
		],
		'acnumber' => [
			'title' => '區號',
		],
		'order_number' => [
			'title' => '排序',
			'hint' => '數值越大，選項卡出現越早'
		],
		'show' => [
			'type' => 'bool',
			'title' => '是否顯示',
			'hint' => '選項卡是否需要顯示'
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
        'acname_en.required' => '英文名不能為空',
        'acname_cn.required' => '中文名不能為空',
        'codename.required' => '代號不能為空',
        'acnumber.required' => '區號不能為空',
    ],

];