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
	'namespace' => 'App\Http\Controllers\Api'
], function($api) {

	$api->group([
		'middleware' => 'api.throttle',
		'limit' => config('api.rate_limits.sign.limit'),
		'expires' => config('api.rate_limits.sign.expires'),
	], function($api) {
		// 用户注册
		$api->post('users','UsersController@store')->name('api.users.store');
		// 用户登录
		$api->post('authorizations', 'AuthorizationsController@store')->name('api.authorizations.store');
		// 刷新token
		$api->put('authorizations/current','AuthorizationsController@update')->name('api.authorizations.update');
		// 删除token	
		$api->delete('authorizations/current','AuthorizationsController@destroy')->name('api.authorizations.destroy');
	});
});







$api->version('v2', function($api) {
	$api->get('version', function() {
		return response('this is v2 version api');
	});
});
