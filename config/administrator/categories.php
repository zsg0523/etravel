<?php

/**
 * @Author: Eden
 * @Date:   2019-01-15 16:44:54
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-15 18:35:44
 */
use App\Models\RuleCategory;

return [

	'title' => '分类信息',

	'single' => '守则分类',

	'model' => RuleCategory::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'travel' => [
			'title' => '旅游',
			'sortable' => false,
			'output' => function ($value, $model) {
				return $model->travel->travel_name;
			},
		],
		'rule_category_name' => [
			'title' => '名称',
			'sortable' => false,
		],
		'type' => [
			'title' => '类型',
			'output' => function ($value, $model) {
				switch ($model->type) {
					case '10':
						return "学生守则";
						break;
					case '20':
						return "我的承诺";
						break;
					case '30':
						return "行李清单";
						break;
				}
			},
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
		'rule_category_name' => [
			'title' => '名称',
		],
		'type' => [
			'enum_numeric_keys' => false,
			'hint' => '10-学生守则,20-我的承诺,30-行李清单',
	        'title' => '类型',
	        'type'  => 'enum',
	        'options' => array(
	            '10',
	            '20',
	            '30'
	        ),
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
		'date' => 'required',
		'from' => 'required',
		'to' => 'required',
		'flight' => 'required',
		'takeoff_time' => 'required',
		'arrival_time' => 'required',
	],

	'messages' => [
        'travel_id.required' => '请选择旅游项目',
    ],








];