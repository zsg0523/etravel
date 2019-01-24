<?php

/**
 * @Author: Eden
 * @Date:   2019-01-18 12:32:10
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-18 12:56:43
 */
use App\Models\Answer;

return [

	'title' => '学习纸答案',

	'single' => '答案',

	'model' => Answer::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'user' => [
			'title' => '用户',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->user->name;
			},
		],
		'travel' => [
			'title' => '旅游',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->question->travel;
			},
		],
		'day' => [
			'title' => '工作纸编号',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->question->day;
			},
		],
		'question' => [
			'title' => '问题',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->question->content;
			},
		],
		'content' => [
			'title' => '答案',
			'sortable' => false,
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'question' => [
			'title'        => '问题',
			'type'         => 'relationship',
			'name_field'   => 'content',
			// 自动补全
			'autocomplete' => true,
			// 自动补全搜索字段
			'search_fields' => ["CONCAT(id,'', content)"],
			// 自动补全排序
			'options_sort_field' => 'id',
		],
		'content' => [
			'title' => '答案',
		],
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'question' => [
			'title' => '问题',
			'type' => 'relationship',
			'name_field' => 'content',
			'autocomplete' => true,
			'search_fields' => ["CONCAT(id,'', content)"],
			'options_sort_field' => 'id'
		],
	],

	'rules' => [
		'question_id' => 'required',
		'content' => 'required',
	],

	'messages' => [
        'question_id.required' => '请选择问题',
    ],








];