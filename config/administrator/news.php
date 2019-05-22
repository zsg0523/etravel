<?php

/**
 * @Author: Eden
 * @Date:   2019-01-21 17:18:29
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 10:50:56
 */
use App\Models\News;

return [

	'title' => '新聞資料',
	'single' => '新聞',
	'model' => News::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'title' => [
			'title' => '標題',
			'sortable' => false,
		],
		'body' => [
			'title' => '內容',
			'sortable' => false,
			'output' => function ($value, $model) {
				return '<div style="max-width:500px; min-width:300px;">' . html_entity_decode($value) . '</div>';
			},
		],
		'view_counts' => [
			'title' => '點擊量',
			'sortable' => false,
		],
		'image' => [
			'title' => '圖片',
			// 默认情况直接输出数据，可是使用 output 选项来定制输出內容
			'output' => function($image, $model)
			{
				return empty($image) ? 'N/A' : '<img src="'.$image.'" width="40">';
			},

			// 是否允许排序
			'sortable' => false,
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'title' => [
			'title' => '標題'
		],
		'body' => [
			'title' => '內容',
			'type' => 'wysiwyg'
		],
		'image' => [
			'title' => '用戶頭像',
			'type' => 'image',
			// 圖片上传路径
			'location' => public_path() . '/uploads/images/news/'
		]
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'title' => [
			'title' => '新聞標題'
		],
	],

	'rules' => [
		'title' => 'required',
		'body' => 'required',
	],







];