<?php

/**
 * @Author: Eden
 * @Date:   2019-01-24 17:25:36
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-24 17:35:31
 */
use App\Models\EvaluationCategory;

return [

	'title' => '评估分类',

	'single' => '评估分类',

	'model' => EvaluationCategory::class,

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
		'title' => [
			'title' => '标识',
			'sortable' => true,
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
			'title' => '标识'
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
	],

	'messages' => [
        'travel_id.required' => '请选择旅游项目',
    ],








];