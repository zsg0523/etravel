<?php

/**
 * @Author: Eden
 * @Date:   2019-01-10 11:17:20
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-12 16:31:18
 */
use App\Models\Hotel;

return [

	'title' => '酒店信息',

	'single' => '酒店信息',

	'model' => Hotel::class,

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

		'hotel_name' => [
			'title' => '酒店名称',
			'sortable' => false,
		],

		'hotel_address' => [
			'title' => '酒店地址',
			'sortable' => false,
		],

		'hotel_date' => [
			'title' => '住宿日期',
			'sortable' => false,
		],

		'hotel_phone' => [
			'title' => '联系电话',
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

		'hotel_name' => [
			'title' => '酒店名称',
		],

		'hotel_address' => [
			'title' => '酒店地址',
		],

		'hotel_date' => [
			'title' => '住宿日期',
		],

		'hotel_phone' => [
			'title' => '联系电话',
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
		'hotel_name' => 'required',
		'hotel_date' => 'required',
		'hotel_phone' => 'required',
		'hotel_address' => 'required',
	],

	'messages' => [
        'travel_id.required' => '请选择旅游项目',
    ],

























];