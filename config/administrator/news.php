<?php

/**
 * @Author: Eden
 * @Date:   2019-01-21 17:18:29
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-21 17:36:31
 */
use App\Models\News;

return [

	'title' => '新闻资料',
	'single' => '新闻',
	'model' => News::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'title' => [
			'title' => '标题',
			'sortable' => false,
		],
		'body' => [
			'title' => '内容',
			'sortable' => false,
			'output' => function ($value, $model) {
				return '<div style="max-width:500px; min-width:300px;">' . html_entity_decode($value) . '</div>';
			},
		],
		'view_counts' => [
			'title' => '点击量',
			'sortable' => false,
		],
		'image' => [
			'title' => '图片',
			// 默认情况直接输出数据，可是使用 output 选项来定制输出内容
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
			'title' => '标题'
		],
		'body' => [
			'title' => '内容',
			'type' => 'wysiwyg'
		],
		'image' => [
			'title' => '用户头像',
			'type' => 'image',
			// 图片上传路径
			'location' => public_path() . '/uploads/images/news/'
		]
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'title' => [
			'title' => '新闻标题'
		],
	],

	'rules' => [
		'title' => 'required',
		'body' => 'required',
	],







];