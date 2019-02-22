<?php

/**
 * @Author: Eden
 * @Date:   2019-02-22 11:58:49
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-02-22 12:03:10
 */
use App\Models\School;

return [

	'title' => '学校信息',
	'single' => '学校',
	'model' => School::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'school_name' => [
			'title' => '名称',
			'sortable' => false,
		],
		'school_introduction' => [
			'title' => '简介',
			'sortable' => false,
		],
		'school_address' => [
			'title' => '地址',
			'sortable' => false,
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'school_name' => [
			'title' => '名称'
		],
		'school_introduction' => [
			'title' => '简介',
			'type' => 'wysiwyg'
		],
		'school_address' => [
			'title' => '地址',
		]
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'school_name' => [
			'title' => '名称'
		],
	],

	'rules' => [
		'school_name' => 'required',
		'school_address' => 'required',
	],







];