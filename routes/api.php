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
	// 手动注册模型中间件bindings
	'middleware' => ['serializer:array','bindings']
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
		
		// 新闻列表
		$api->get('news','NewsController@index')->name('api.news.index');
		// 新闻详情
		$api->get('new/{new}','NewsController@show')->name('api.news.show');




		// 需要 token 验证的接口
		$api->group(['middleware' => 'api.auth'], function($api) {
			// 用户列表
			$api->get('userlist','UsersController@index')->name('api.user.index');
			// 当前登录用户信息
			$api->get('user','UsersController@me')->name('api.user.show');
			// 访问图片资源
			$api->post('images','ImagesController@store')->name('api.images.store');
			// 编辑用户资料
			$api->patch('user','UsersController@update')->name('api.user.update');

			
			// 创建新闻
			$api->post('new','NewsController@store')->name('api.news.store');
			// 编辑新闻
			$api->patch('new/{new}','NewsController@update')->name('api.news.update');
			// 删除新闻	
			$api->delete('new/{new}','NewsController@destroy')->name('api.news.destroy');

			// 电话簿
			$api->get('telephone','TelephoneController@index')->name('api.telephone.index');
			// 增加联系人电话
			$api->post('telephone','TelephoneController@store')->name('api.telephone.store');
			// 更新联系人电话
			$api->patch('telephone/{telephone}','TelephoneController@update')->name('api.telephone.update');
			// 删除联系人电话
			$api->delete('telephone/{telephone}','TelephoneController@destroy')->name('api.telephone.destroy');


			// 旅游基本信息
			$api->get('travel','TravelsController@index')->name('api.travel.index');
			// 旅游详情
			$api->get('travel/{travel}','TravelsController@show')->name('api.travel.show');
			// 创建旅游信息
			$api->post('travel','TravelsController@store')->name('api.travel.store');
			// 更新旅游信息	
			$api->patch('travel/{travel}','TravelsController@update')->name('api.travel.update');
			// 删除旅游项目
			$api->delete('travel/{travel}','TravelsController@destroy')->name('api.travel.destroy');

			// 航班信息列表
			$api->get('flights','FlightsController@index')->name('api.flights.index');
			// 航班详情
			$api->get('flight/{flight}','FlightsController@show')->name('api.flights.show');
			// 新增航班
			$api->post('flight','FlightsController@store')->name('api.flights.store');	
			// 更新航班信息
			$api->patch('flight/{flight}','FlightsController@update')->name('api.flights.update');
			// 删除航班
			$api->delete('flight/{flight}','FlightsController@destroy')->name('api.flights.destroy');


			// 酒店信息
			$api->get('hotels','HotelsController@index')->name('api.hotels.index');
			// 酒店详情
			$api->get('hotel/{hotel}','HotelsController@show')->name('api.hotels.show');
			// 新增酒店
			$api->post('hotel','HotelsController@store')->name('api.hotels.store');
			// 更新酒店信息
			$api->patch('hotel/{hotel}','HotelsController@update')->name('api.hotels.update');
			// 删除酒店
			$api->delete('hotel/{hotel}','HotelsController@destroy')->name('api.hotels.destroy');

			// 守则列表
			$api->get('rules','RulesController@index')->name('api.rules.index');
			// 守则详情
			$api->get('rule/{rule}','RulesController@show')->name('api.rules.show');
			// 创建守则
			$api->post('rule','RulesController@store')->name('api.rules.store');
			// 更新守则
			$api->patch('rule/{rule}','RulesController@update')->name('api.rules.update');
			// 删除守则
			$api->delete('rule/{rule}','RulesController@destroy')->name('api.rules.destroy');





















		});





























	});
});







$api->version('v2', function($api) {
	$api->get('version', function() {
		return response('this is v2 version api');
	});
});
