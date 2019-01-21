<?php

/**
 * @Author: Eden
 * @Date:   2019-01-21 17:57:48
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-01-21 18:00:22
 */
use App\Models\WriteTitle;

return [

	'title' => '感想分类',

	'single' => '分类',

	'model' => WriteTitle::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'title' => [
			'title' => '标题',
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
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
	],

	'rules' => [
		'title' => 'required',
	],








];