<?php

/**
 * @Author: Eden
 * @Date:   2019-01-22 15:22:52
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-23 10:47:29
 */
use App\Models\Local;

return [

	'title' => '当地文化',

	'single' => '当地文化',

	'model' => Local::class,

	'columns' => [

		'id' => [
			'title' => 'ID',
		],

		'travel' => [
			'title' => '旅游项目',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->travel->travel_name;
			}
		],
		'title' => [
			'title' => '标题',
			'sortable' => false,
		],
		'content' => [
			'title' => '简介',
			'sortable' => false,
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

		'title' => [
			'title' => '标题',
		],

		'content' => [
			'title' => '简介',
			'type'  => 'wysiwyg'
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
		'title' => 'required',
		'content' => 'required',
	],

	'messages' => [
        'travel_id.required' => '请选择旅游项目',
    ],

























];