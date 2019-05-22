<?php

/**
 * @Author: Eden
 * @Date:   2019-01-21 17:57:48
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-22 11:12:28
 */
use App\Models\WriteTitle;

return [

	'title' => '感想分類',

	'single' => '分類',

	'model' => WriteTitle::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'title' => [
			'title' => '標題',
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