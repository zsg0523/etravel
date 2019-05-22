<?php

/**
 * @Author: Eden
 * @Date:   2019-01-10 10:11:36
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 10:56:35
 */
use App\Models\Travel;

return [

	'title' => '相關安排',
	'single' => '旅遊',
	'model' => Travel::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'travel_name' => [
			'title' => '旅遊名稱',
			'sortable' => false,
		],
		'urgency' => [
			'title' => '惡劣天氣安排',
			'output' => function ($value, $model) {
				return '<div style="max-width:500px; min-width:300px;">' . html_entity_decode($value) . '</div>';
			},
			'sortable' => false,
		],
		'view_plan' => [
			'title' => '景點安排',
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
			'title' => '旅遊名稱'
		],
		'urgency' => [
			'title' => '惡劣天氣安排',
			'type'  => 'wysiwyg',
		],
		'view_plan' => [
			'title' => '景點安排',
			'type'  => 'wysiwyg',
		],
		'meal_plan' => [
			'title' => '膳食安排',
			'type'  => 'wysiwyg',
		],
	],

	'filters' => [
		'id' => [
			'title' => '旅遊 ID'
		],
		'travel_name' => [
			'title' => '旅遊名稱'
		],
	],
];