<?php

/**
 * @Author: Eden
 * @Date:   2019-01-18 12:05:10
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 10:53:05
 */
use App\Models\Question;

return [

	'title' => '學習紙問題',

	'single' => '問題',

	'model' => Question::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'study' => [
			'title' => '旅遊工作紙',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->study->tag;
			},
		],
		'content' => [
			'title' => '問題',
			'sortable' => false,
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'study' => [
			'title'        => '旅遊工作紙',
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
			'title' => '問題',
		],
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'study' => [
			'title' => '旅遊工作紙',
			'type' => 'relationship',
			'name_field' => 'tag',
			'autocomplete' => true,
			'search_fields' => ["CONCAT(id,'', title)"],
			'options_sort_field' => 'id'
		],
	],

	'rules' => [
		'study_id' => 'required',
		'content' => 'required',
	],

	'messages' => [
        'study_id.required' => '請選擇工作紙',
    ],








];