<?php

/**
 * @Author: Eden
 * @Date:   2019-01-18 10:08:02
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-18 11:20:56
 */
use App\Models\Study;

return [

	'title' => '学习纸',

	'single' => '学习纸',

	'model' => Study::class,

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
		'title' => [
			'title' => '标题',
			'sortable' => false,
		],
		'image' => [
			'title' => '图片',
			'output' => function ($image, $model)
			{
				return empty($image) ? 'N/A' : '<img src="'. $image .'" width="40">';
			},
			'sortable' => false,
		],
		'body' => [
			'title' => '内容',
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
		'title' => [
			'title' => '标题'
		],
		'image' => [
			'title' => '图片',
			'type' => 'image',
			// 图片上传路径
			'location' => public_path() . '/uploads/images/studies/'
		],
		'body' => [
			'title' => '内容',
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
	],

	'rules' => [
		'route_id' => 'required',
		'title' => 'required',
		'body' => 'required',
	],

	'messages' => [
        'route_id.required' => '请选择旅游日程',
    ],








];