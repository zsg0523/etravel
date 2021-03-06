<?php

/**
 * @Author: Eden
 * @Date:   2019-01-10 11:17:30
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 10:34:26
 */
use App\Models\Flight;

return [

	'title' => '航班信息',

	'single' => '航班信息',

	'model' => Flight::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'travel' => [
			'title' => '旅遊',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->travel->travel_name;
			},
		],
		'date' => [
			'title' => '日期',
			'sortable' => false,
		],
		'from' => [
			'title' => '出發地',
			'sortable' => false,
		],
		'to' => [
			'title' => '到達地',
			'sortable' => false,
		],
		'flight' => [
			'title' => '航班',
			'sortable' => false,
		],
		'takeoff_time' => [
			'title' => '起飛時間',
			'sortable' => false,
		],
		'arrival_time' => [
			'title' => '到達時間',
			'sortable' => false,
		],
		'is_return' => [
			'title' => '是否返程航班',
			'sortable' => false,
			'output' => function ($value) {
				return $value ? '返' : '去';
			}
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
		'date' => [
			'title' => '日期',
			'type' => 'date'
		],
		'from' => [
			'title' => '出發地'
		],
		'to' => [
			'title' => '到達地',
		],
		'flight' => [
			'title' => '航班'
		],
		'takeoff_time' => [
			'title' => '起飛時間',
			'type' => 'datetime'
		],
		'arrival_time' => [
			'title' => '到達時間',
			'type' => 'datetime'
		],
		'is_return' => [
			'title' => '是否返程航班',
			'type' => 'bool',
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
		'date' => 'required',
		'from' => 'required',
		'to' => 'required',
		'flight' => 'required',
		'takeoff_time' => 'required',
		'arrival_time' => 'required',
	],

	'messages' => [
        'travel_id.required' => '請選擇旅遊項目',
    ],








];