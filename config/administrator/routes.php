<?php

/**
 * @Author: Eden
 * @Date:   2019-01-17 16:50:16
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-17 17:33:05
 */
use App\Models\Route;

return [

	'title' => '基本信息',

	'single' => '旅游行程',

	'model' => Route::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'travel' => [
			'title' => '旅游',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->travel->travel_name;
			},
		],
		'day' => [
			'title' => '编号',
			'sortable' => true,
		],
		'date' => [
			'title' => '日期',
			'sortable' => true,
		],
		'description' => [
			'title' => '简介',
			'sortable' => false,
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'travel' => [
			'title'        => '旅游',
			'type'         => 'relationship',
			'name_field'   => 'travel_name',
			// 自动补全
			'autocomplete' => true,
			// 自动补全搜索字段
			'search_fields' => ["CONCAT(id,'', travel_name)"],
			// 自动补全排序
			'options_sort_field' => 'id',
		],
		'day' => [
			'title' => '编号'
		],
		'date' => [
			'title' => '日期',
			'type' => 'date'
		],
		'description' => [
			'title' => '描述',
			'type' => 'textarea',
		],
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'travel' => [
			'title' => '旅游',
			'type' => 'relationship',
			'name_field' => 'travel_name',
			'autocomplete' => true,
			'search_fields' => ["CONCAT(id,'', travel_name)"],
			'options_sort_field' => 'id'
		],
	],

	'rules' => [
		'travel_id' => 'required',
		'date' => 'required',
		'day' => 'required',
		'description' => 'required',
	],

	'messages' => [
        'travel_id.required' => '请选择旅游项目',
    ],








];