<?php

/**
 * @Author: Eden
 * @Date:   2019-01-17 17:35:50
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-17 17:42:24
 */
use App\Models\Scenery;

return [

	'title' => '景点安排',

	'single' => '景点资料',

	'model' => Scenery::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'route' => [
			'title' => '旅游日程',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->route->tag;
			},
		],
		'content' => [
			'title' => '景点',
			'sortable' => false,
		],
		'time' => [
			'title' => '时间',
			'sortable' => false,
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
		'route' => [
			'title'        => '旅游日程',
			'type'         => 'relationship',
			'name_field'   => 'tag',
			// 自动补全
			'autocomplete' => true,
			// 自动补全搜索字段
			'search_fields' => ["CONCAT(id,'', day)"],
			// 自动补全排序
			'options_sort_field' => 'id',
		],
		'content' => [
			'title' => '景点'
		],
		'time' => [
			'title' => '时间',
			'type' => 'time',
			'time_format' => 'HH:mm',
		],
		'description' => [
			'title' => '简介',
			'type' => 'textarea',
		],
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'route' => [
			'title' => '旅游日程',
			'type' => 'relationship',
			'name_field' => 'tag',
			'autocomplete' => true,
			'search_fields' => ["CONCAT(id,'', day)"],
			'options_sort_field' => 'id'
		],
		'content' => [
			'title' => '景点'
		],
		'time' => [
			'title' => '时间',
			'type' => 'time',
			'time_format' => 'HH:mm',
		],
	],

	'rules' => [
		'route_id' => 'required',
		'title' => 'required',
		'content' => 'required',
		'description' => 'required',
	],

	'messages' => [
        'route_id.required' => '请选择旅游日程',
    ],








];