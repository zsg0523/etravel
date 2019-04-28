<?php

/**
 * @Author: Eden
 * @Date:   2019-01-10 10:11:36
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-23 10:45:04
 */
use App\Models\Travel;

return [

	'title' => '基本资料',
	'single' => '旅游',
	'model' => Travel::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'school_id' => [
			'title' => '关联学校名称',
			'output' => function ($value, $model) {
				return empty($model->school->school_name) ? 'N/A' : $model->school->school_name;
			},
		],
		'school_name' => [
			'title' => '自定义学校名称',
			'sortable' => false,
		],
		'travel_name' => [
			'title' => '旅游名称',
			'sortable' => false,
		],
		'travel_at' => [
			'title' => '旅游时间',
			'sortable' => false,
		],
		'travel_introduction' => [
			'title' => '简介',
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
			'title' => '集合时间',
			'sortable' => false,
		],
		'dissolution_station' => [
			'title' => '解散地点',
			'sortable' => false,
		],
		'dissolution_at' => [
			'title' => '解散时间',
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
			'title' => '关联学校名称',
			'type' => 'relationship',
			'name_field' => 'school_name',
		],
		'school_name' => [
			'title' => '自定义学校名称'
		],
		'travel_name' => [
			'title' => '旅游名称'
		],
		'travel_at' => [
			'title' => '旅游时间',
			'type' => 'date'
		],
		'travel_introduction' => [
			'title' => '简介',
			'type' => 'wysiwyg'
		],
		'assembly_station' => [
			'title' => '集合地点'
		],
		'assembly_at' => [
			'title' => '集合时间',
			'type' => 'datetime'
		],
		'dissolution_station' => [
			'title' => '解散地点'
		],
		'dissolution_at' => [
			'title' => '解散时间',
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
			'title' => '旅游 ID'
		],
		'travel_name' => [
			'title' => '旅游名称'
		],
	],

	'rules' => [
		'travel_name' => 'required|unique:travels',
		'travel_at' => 'required',
	],

	'messages' => [
        'travel_name.unique'   => '分类名在数据库里有重复，请选用其他名称。',
        'travel_name.required' => '请确保名字至少一个字符以上',
    ],







];