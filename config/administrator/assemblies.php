<?php

/**
 * @Author: Eden
 * @Date:   2019-01-10 11:17:25
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 10:20:01
 */
use App\Models\Assembly;

return [

	'title' => '領隊老師',

	'single' => '領隊老師',

	'model' => Assembly::class,

	'columns' => [

		'id' => [
			'title' => 'ID',
		],

		'travel' => [
			'title' => '旅遊項目',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->travel->travel_name;
			}
		],

		'leader' => [
			'title' => '領隊',
			'sortable' => false,
		],

		'phone' => [
			'title' => '聯繫電話',
			'sortable' => false,
		],

		'duty' => [
			'title' => '職責',
			'sortable' => false,
		],

		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [

		'travel' => [
			'title'        => '旅遊',
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
			'title' => '領隊',
		],

		'phone' => [
			'title' => '聯繫電話',
		],

		'duty' => [
			'title' => '職責',
		],
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'travel' => [
			'title' => '旅遊',
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
        'travel_id.required' => '請選擇旅遊項目',
    ],


];