<?php

/**
 * @Author: Eden
 * @Date:   2019-01-10 10:11:36
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 11:11:02
 */
use App\Models\Travel;

return [

	'title' => '基本資料',
	'single' => '旅遊',
	'model' => Travel::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'school_id' => [
			'title' => '關聯學校名稱',
			'output' => function ($value, $model) {
				return empty($model->school->school_name) ? 'N/A' : $model->school->school_name;
			},
		],
		'school_name' => [
			'title' => '自定義學校名稱',
			'sortable' => false,
		],
		'travel_name' => [
			'title' => '旅遊名稱',
			'sortable' => false,
		],
		'travel_at' => [
			'title' => '旅遊時間',
			'sortable' => false,
		],
		'travel_introduction' => [
			'title' => '簡介',
			'sortable' => false,
			'output' => function ($value, $model) {
				return '<div style="max-width:500px; min-width:300px;">' . html_entity_decode($value) . '</div>';
			},
		],
		'assembly_station' => [
			'title' => '集合地点',
			'sortable' => false,
		],
		'assembly_at' => [
			'title' => '集合時間',
			'sortable' => false,
		],
		'dissolution_station' => [
			'title' => '解散地点',
			'sortable' => false,
		],
		'dissolution_at' => [
			'title' => '解散時間',
			'sortable' => false,
		],
		// 'urgency' => [
		// 	'title' => '恶劣天气安排',
		// 	'output' => function ($value, $model) {
		// 		return '<div style="max-width:250px">' . html_entity_decode($value) . '</div>';
		// 	},
		// 	'sortable' => false,
		// ],
		// 'view_plan' => [
		// 	'title' => '景点安排',
		// 	'output' => function ($value, $model) {
		// 		return '<div style="max-width:250px">' . html_entity_decode($value) . '</div>';
		// 	},
		// 	'sortable' => false,
		// ],
		// 'meal_plan' => [
		// 	'title' => '膳食安排',
		// 	'output' => function ($value, $model) {
		// 		return '<div style="max-width:250px">' . html_entity_decode($value) . '</div>';
		// 	},
		// 	'sortable' => false,
		// ],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'school' => [
			'title' => '關聯學校名稱',
			'type' => 'relationship',
			'name_field' => 'school_name',
		],
		'school_name' => [
			'title' => '自定義學校名稱'
		],
		'travel_name' => [
			'title' => '旅遊名稱'
		],
		'travel_at' => [
			'title' => '旅遊時間',
			'type' => 'date'
		],
		'travel_introduction' => [
			'title' => '簡介',
			'type' => 'wysiwyg'
		],
		'assembly_station' => [
			'title' => '集合地点'
		],
		'assembly_at' => [
			'title' => '集合時間',
			'type' => 'datetime'
		],
		'dissolution_station' => [
			'title' => '解散地点'
		],
		'dissolution_at' => [
			'title' => '解散時間',
			'type' => 'datetime'
		],
		// 'urgency' => [
		// 	'title' => '恶劣天气安排',
		// 	'type'  => 'wysiwyg',
		// ],
		// 'view_plan' => [
		// 	'title' => '景点安排',
		// 	'type'  => 'wysiwyg',
		// ],
		// 'meal_plan' => [
		// 	'title' => '膳食安排',
		// 	'type'  => 'wysiwyg',
		// ],
	],

	'filters' => [
		'id' => [
			'title' => '旅遊 ID'
		],
		'travel_name' => [
			'title' => '旅遊名稱'
		],
	],

	'rules' => [
		'travel_name' => 'required|unique:travels',
		'travel_at' => 'required',
	],

	'messages' => [
        'travel_name.unique'   => '分類名有重複，請選用其他名稱',
        'travel_name.required' => '請確保名稱在一個字符以上',
    ],







];