<?php

/**
 * @Author: Eden
 * @Date:   2019-01-21 18:01:03
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-21 18:18:14
 */
use App\Models\Write;

return [

	'title' => '感想列表',

	'single' => '感想',

	'model' => Write::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'write_title' => [
			'title' => '感想分类',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->write_title->title;
			},
		],
		'user' => [
			'title' => '姓名',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->user->name;
			},
		],
		'travel' => [
			'title' => '旅游',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->travel->travel_name;
			},
		],
		'content' => [
			'title' => '内容',
			'sortable' => true,
			'output' => function ($value, $model) {
				return '<div style="max-width:500px; min-width:300px;">' . html_entity_decode($value) . '</div>';
			},
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'write_title' => [
			'title'        => '分类',
			'type'         => 'relationship',
			'name_field'   => 'title',
			// 自动补全
			'autocomplete' => true,
			// 自动补全搜索字段
			'search_fields' => ["CONCAT(id,'', title)"],
			// 自动补全排序
			'options_sort_field' => 'id',
		],
		'user' => [
			'title'        => '用户',
			'type'         => 'relationship',
			'name_field'   => 'name',
			// 自动补全
			'autocomplete' => true,
			// 自动补全搜索字段
			'search_fields' => ["CONCAT(id,'', name)"],
			// 自动补全排序
			'options_sort_field' => 'id',
		],
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
		'content' => [
			'title' => '内容',
			'type' => 'wysiwyg'
		],
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'write_title' => [
			'title' => '分类',
			'type' => 'relationship',
			'name_field' => 'title',
			'autocomplete' => true,
			'search_fields' => ["CONCAT(id,'', title)"],
			'options_sort_field' => 'id'
		],
		'user' => [
			'title' => '用户',
			'type' => 'relationship',
			'name_field' => 'name',
			'autocomplete' => true,
			'search_fields' => ["CONCAT(id,'', name)"],
			'options_sort_field' => 'id'
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
		'write_title_id' => 'required',
		'user_id' => 'required',
		'content' => 'required',
	],

	'messages' => [
        'travel_id.required' => '请选择旅游项目',
        'write_title_id.required' => '请选择感想分类',
        'user_id.required' => '请选择用户',
    ],








];