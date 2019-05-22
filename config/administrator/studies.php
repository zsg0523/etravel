<?php

/**
 * @Author: Eden
 * @Date:   2019-01-18 10:08:02
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 11:06:52
 */
use App\Models\Study;

return [

	'title' => '基本信息',

	'single' => '學習紙',

	'model' => Study::class,

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
			'title' => '標題',
			'sortable' => false,
		],
		'image' => [
			'title' => '圖片',
			'output' => function ($image, $model)
			{
				return empty($image) ? 'N/A' : '<img src="'. $image .'" width="40">';
			},
			'sortable' => false,
		],
		'body' => [
			'title' => '内容',
			'sortable' => false,
			'output' => function ($value, $model) {
				return '<div>' . html_entity_decode($value) . '</div>';
			},
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
			'title' => '標題'
		],
		'image' => [
			'title' => '圖片',
			'type' => 'image',
			// 圖片上传路径
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
		'body' => 'required',
	],

	'messages' => [
        'route_id.required' => '請選擇旅遊日程',
    ],








];