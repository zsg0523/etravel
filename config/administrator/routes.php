<?php

/**
 * @Author: Eden
 * @Date:   2019-01-17 16:50:16
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 10:58:27
 */
use App\Models\Route;

return [

	'title' => '基本信息',

	'single' => '旅遊行程',

	'model' => Route::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'travel' => [
			'title' => '旅遊',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->travel->travel_name;
			},
		],
		'day' => [
			'title' => '編號',
			'sortable' => true,
		],
		'date' => [
			'title' => '日期',
			'sortable' => true,
		],
		'description' => [
			'title' => '簡介',
			'sortable' => false,
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'travel' => [
			'title'        => '旅遊',
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
			'title' => '編號'
		],
		'date' => [
			'title' => '日期',
			'type' => 'date'
		],
		'description' => [
			'title' => '簡介',
			'type' => 'textarea',
		],
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'travel' => [
			'title' => '旅遊',
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
        'travel_id.required' => '請選擇旅遊項目',
    ],








];