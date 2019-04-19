<?php

/**
 * @Author: Eden
 * @Date:   2019-01-10 10:11:36
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-23 10:45:04
 */
use App\Models\Travel;

return [

	'title' => '相关安排',
	'single' => '旅游',
	'model' => Travel::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'travel_name' => [
			'title' => '旅游名称',
			'sortable' => false,
		],
		'urgency' => [
			'title' => '恶劣天气安排',
			'output' => function ($value, $model) {
				return '<div style="max-width:500px; min-width:300px;">' . html_entity_decode($value) . '</div>';
			},
			'sortable' => false,
		],
		'view_plan' => [
			'title' => '景点安排',
			'output' => function ($value, $model) {
				return '<div style="max-width:500px; min-width:300px;">' . html_entity_decode($value) . '</div>';
			},
			'sortable' => false,
		],
		'meal_plan' => [
			'title' => '膳食安排',
			'output' => function ($value, $model) {
				return '<div style="max-width:500px; min-width:300px;">' . html_entity_decode($value) . '</div>';
			},
			'sortable' => false,
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'travel_name' => [
			'title' => '旅游名称'
		],
		'urgency' => [
			'title' => '恶劣天气安排',
			'type'  => 'wysiwyg',
		],
		'view_plan' => [
			'title' => '景点安排',
			'type'  => 'wysiwyg',
		],
		'meal_plan' => [
			'title' => '膳食安排',
			'type'  => 'wysiwyg',
		],
	],

	'filters' => [
		'id' => [
			'title' => '旅游 ID'
		],
		'travel_name' => [
			'title' => '旅游名称'
		],
	],
];