<?php

/**
 * @Author: Eden
 * @Date:   2019-01-24 17:42:04
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 10:31:38
 */
use App\Models\Evaluation;

return [

	'title' => '評估選項',

	'single' => '評估選項',

	'model' => Evaluation::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'evaluation_category' => [
			'title' => '旅遊日程',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->evaluation_category->tag;
			},
		],
		'content' => [
			'title' => '內容',
			'sortable' => false,
		],
		'type' => [
			'title' => '類型',
			'sortable' => false,
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'evaluation_category' => [
			'title'        => '旅遊日程',
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
			'title' => '地點',
		],
		'type' => [
			'title' => '類型',
			'hint' => '1-單選/2-Yes or No/3-任意選項'
		]
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'evaluation_category' => [
			'title' => '旅遊日程',
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
        'evaluation_category_id.required' => '請選擇評估分類',
    ],








];