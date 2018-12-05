<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
	'namespace' => 'App\Http\Controllers\Api',
	'middleware' => 'serializer:array'
], function($api) {

	$api->group([
		'middleware' => 'api.throttle',
		'limit' => config('api.rate_limits.sign.limit'),
		'expires' => config('api.rate_limits.sign.expires'),
	], function($api) {
		// 游客可访问接口
		// 用户注册
		$api->post('users','UsersController@store')->name('api.users.store');
		// 用户登录
		$api->post('authorizations', 'AuthorizationsController@store')->name('api.authorizations.store');
		// 刷新token
		$api->put('authorizations/current','AuthorizationsController@update')->name('api.authorizations.update');
		// 删除token	
		$api->delete('authorizations/current','AuthorizationsController@destroy')->name('api.authorizations.destroy');
		





		// 需要 token 验证的接口
		$api->group(['middleware' => 'api.auth'], function($api) {
			// 当前登录用户信息
			$api->get('user','UsersController@me')->name('api.user.show');
			// 访问图片资源
			$api->post('images','ImagesController@store')->name('api.images.store');
			// 编辑用户资料
			$api->patch('user','UsersController@update')->name('api.user.update');
			// 电话簿
			$api->get('telephone','TelephoneController@index')->name('api.telephone.index');
			// 旅游基本信息
			$api->get('travel','TravelsController@index')->name('api.travel.index');
		});





























	});
});







$api->version('v2', function($api) {
	$api->get('version', function() {
		return response('this is v2 version api');
	});
});
