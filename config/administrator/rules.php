<?php

/**
 * @Author: Eden
 * @Date:   2019-01-15 18:37:05
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 11:04:27
 */
use App\Models\Rule;

return [

	'title' => '守則列表',

	'single' => '守則',

	'model' => Rule::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'ruleCategory' => [
			'title' => '標識',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->ruleCategory->tag;
			},
		],
		'rule' => [
			'title' => '內容',
			'sortable' => false,
			'output' => function ($value, $model) {
				return '<div style="max-width:500px; min-width:300px;">' . html_entity_decode($value) . '</div>';
			},
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'ruleCategory' => [
			'title'        => '分類',
			'type'         => 'relationship',
			'name_field'   => 'tag',
			// 自动补全
			// 'autocomplete' => true,
			// 自动补全搜索字段
			// 'search_fields' => ["CONCAT(id,'', rule_category_name)"],
			// 自动补全排序
			// 'options_sort_field' => "CONCAT(travel_id, ' ' , rule_category_name)",
		],
		'rule' => [
			'title' => '內容',
			'type'  => 'wysiwyg'
		],
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'ruleCategory' => [
			'title' => '分類',
			'type' => 'relationship',
			'name_field' => 'rule_category_name',
			// 'autocomplete' => true,
			// 'search_fields' => ["CONCAT(id,'', rule_category_name)"],
			// 'options_sort_field' => 'id'
		],
	],

	'rules' => [
		'rule_category_id' => 'required',
		'date' => 'required',
		'from' => 'required',
		'to' => 'required',
		'flight' => 'required',
		'takeoff_time' => 'required',
		'arrival_time' => 'required',
	],

	'messages' => [
        'rule_category_id.required' => '請選擇分類',
    ],








];