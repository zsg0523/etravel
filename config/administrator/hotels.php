<?php

/**
 * @Author: Eden
 * @Date:   2019-01-10 11:17:20
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 10:48:07
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
			'title' => '旅遊項目',

			'sortable' => false,

			'output' => function ($value, $model) {
				return $model->travel->travel_name;
			}
		],

		'hotel_name' => [
			'title' => '酒店名稱',
			'sortable' => false,
		],

		'hotel_address' => [
			'title' => '酒店地址',
			'sortable' => false,
		],

		'check_at' => [
			'title' => '入住日期',
			'sortable' => false,
		],

		'leave_at' => [
			'title' => '離開日期',
			'sortable' => false,
		],

		'times' => [
			'title' => '共幾晚',
			'sortable' => false,
		],

		'image' => [
			'title' => '酒店圖片',
			// 默认情况直接输出数据，可是使用 output 选项来定制输出内容
			'output' => function($image, $model)
			{
				return empty($image) ? 'N/A' : '<img src="'.$image.'" width="40">';
			},

			// 是否允许排序
			'sortable' => false,
		],

		'hotel_phone' => [
			'title' => '聯繫電話',
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

		'hotel_name' => [
			'title' => '酒店名稱',
		],

		'hotel_address' => [
			'title' => '詳細地址',
		],

		'check_at' => [
			'title' => '入住日期',
			'type' => 'date',
		],

		'leave_at' => [
			'title' => '離開日期',
			'type' => 'date',
		],

		'times' => [
			'title' => '共幾晚',
		],

		'image' => [
			'title' => '酒店圖片',
			'type' => 'image',
			// 图片上传路径
			'location' => public_path() . '/uploads/images/hotels/'
		],

		'hotel_phone' => [
			'title' => '聯繫電話',
		]
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
		'hotel_name' => 'required',
		'check_at' => 'required',
		'leave_at' => 'required',
		'times' => 'required',
		'image' => 'required',
		'hotel_phone' => 'required',
		'hotel_address' => 'required',
	],

	'messages' => [
        'travel_id.required' => '請選擇旅遊項目',
    ],

























];