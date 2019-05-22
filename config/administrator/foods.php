<?php

/**
 * @Author: Eden
 * @Date:   2019-01-17 17:16:59
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 10:35:49
 */
use App\Models\Food;

return [

	'title' => '膳食安排',

	'single' => '膳食資料',

	'model' => Food::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'route' => [
			'title' => '旅遊日程',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->route->tag;
			},
		],
		'title' => [
			'title' => '標識',
			'sortable' => false,
		],
		'content' => [
			'title' => '地點',
			'sortable' => false,
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
		'route' => [
			'title'        => '旅遊日程',
			'type'         => 'relationship',
			'name_field'   => 'tag',
			// 自动补全
			'autocomplete' => true,
			// 自动补全搜索字段
			'search_fields' => ["CONCAT(id,'', day)"],
			// 自动补全排序
			'options_sort_field' => 'id',
		],
		'title' => [
			'title' => '標識'
		],
		'content' => [
			'title' => '地點',
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
		'route' => [
			'title' => '旅遊日程',
			'type' => 'relationship',
			'name_field' => 'tag',
			'autocomplete' => true,
			'search_fields' => ["CONCAT(id,'', day)"],
			'options_sort_field' => 'id'
		],
	],

	'rules' => [
		'route_id' => 'required',
		'title' => 'required',
		'content' => 'required',
		'description' => 'required',
	],

	'messages' => [
        'route_id.required' => '請選擇旅遊日程',
    ],








];