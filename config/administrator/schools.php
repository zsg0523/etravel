<?php

/**
 * @Author: Eden
 * @Date:   2019-02-22 11:58:49
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 11:06:08
 */
use App\Models\School;

return [

	'title' => '學校信息',
	'single' => '學校',
	'model' => School::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'school_name' => [
			'title' => '名稱',
			'sortable' => false,
		],
		'school_introduction' => [
			'title' => '簡介',
			'sortable' => false,
			'output' => function ($value, $model) {
				return '<div style="max-width:500px; min-width:300px;">' . html_entity_decode($value) . '</div>';
			},
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
			'title' => '名稱'
		],
		'school_introduction' => [
			'title' => '簡介',
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
			'title' => '名稱'
		],
	],

	'rules' => [
		'school_name' => 'required',
		'school_address' => 'required',
	],







];