<?php

/**
 * @Author: Eden
 * @Date:   2019-01-24 17:42:04
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-24 17:59:47
 */
use App\Models\Evaluation;

return [

	'title' => '评估选项',

	'single' => '评估选项',

	'model' => Evaluation::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'evaluation_category' => [
			'title' => '旅游日程',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->evaluation_category->tag;
			},
		],
		'content' => [
			'title' => '内容',
			'sortable' => false,
		],
		'type' => [
			'title' => '类型',
			'sortable' => false,
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'evaluation_category' => [
			'title'        => '旅游日程',
			'type'         => 'relationship',
			'name_field'   => 'tag',
			// 自动补全
			'autocomplete' => true,
			// 自动补全搜索字段
			'search_fields' => ["CONCAT(id,'', title)"],
			// 自动补全排序
			'options_sort_field' => 'id',
		],
		'content' => [
			'title' => '地点',
		],
		'type' => [
			'title' => '类型',
			'hint' => '1-单选/2-Yes or No/3-任意选项'
		]
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'evaluation_category' => [
			'title' => '旅游日程',
			'type' => 'relationship',
			'name_field' => 'tag',
			'autocomplete' => true,
			'search_fields' => ["CONCAT(id,'', title)"],
			'options_sort_field' => 'id'
		],
	],

	'rules' => [
		'evaluation_category_id' => 'required',
		'content' => 'required',
		'type' => 'required',
	],

	'messages' => [
        'evaluation_category_id.required' => '请选择评估分类',
    ],








];