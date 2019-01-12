<?php

/**
 * @Author: Eden
 * @Date:   2019-01-10 11:17:25
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-12 16:30:38
 */
use App\Models\Assembly;

return [

	'title' => '领队老师',

	'single' => '领队老师',

	'model' => Assembly::class,

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

		'leader' => [
			'title' => '领队',
			'sortable' => false,
		],

		'phone' => [
			'title' => '联系电话',
			'sortable' => false,
		],

		'duty' => [
			'title' => '职责',
			'sortable' => false,
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

		'leader' => [
			'title' => '领队',
		],

		'phone' => [
			'title' => '联系电话',
		],

		'duty' => [
			'title' => '职责',
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
		'leader' => 'required',
		'phone' => 'required',
		'duty' => 'required',
	],

	'messages' => [
        'travel_id.required' => '请选择旅游项目',
    ],


];