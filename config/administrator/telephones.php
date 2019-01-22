<?php

/**
 * @Author: Eden
 * @Date:   2019-01-12 16:19:28
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-12 16:32:20
 */
use App\Models\Telephone;

return [

	'title' => '常用电话',

	'single' => '联系方式',

	'model' => Telephone::class,

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

		'name' => [
			'title' => '姓名',
			'sortable' => false,
		],

		'phone' => [
			'title' => '电话',
			'sortable' => false,
		],

		'area_code' => [
			'title' => '区号',
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

		'name' => [
			'title' => '姓名',
		],

		'phone' => [
			'title' => '电话',
		],

		'area_code' => [
			'title' => '区号',
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
		'name' => 'required',
		'phone' => 'required',
		'area_code' => 'required',
	],

	'messages' => [
        'travel_id.required' => '请选择旅游项目',
        'area_code.required' => '请填写区号'
    ],


];