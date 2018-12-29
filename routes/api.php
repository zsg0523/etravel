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
		// 短信验证码
		$api->post('verificationCodes', 'VerificationCodesController@store')->name('api.verificationCodes.store'); 
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

			// 旅游团基本信息
			$api->get('travels','TravelsController@index')->name('api.travel.index');
			// 用户的旅游团
			$api->get('users/{user}/travels', 'TravelsController@userIndex')->name('api.users.travels.index');
			// 旅游团详情
			$api->get('travels/{travel}','TravelsController@show')->name('api.travel.show');
			// 创建旅游信息
			$api->post('travels','TravelsController@store')->name('api.travel.store');
			// 更新旅游信息	
			$api->patch('travels/{travel}','TravelsController@update')->name('api.travel.update');
			// 删除旅游项目
			$api->delete('travels/{travel}','TravelsController@destroy')->name('api.travel.destroy');

			// 所有紧急联系人
			$api->get('telephones', 'TelephoneController@index')->name('api.telephone.index');
			// 旅游团紧急联系人
			$api->get('travels/{travel}/telephones', 'TelephoneController@travelIndex')->name('api.travels.telephones.index');
			// 增加联系人电话
			$api->post('telephones', 'TelephoneController@store')->name('api.telephone.store');
			// 更新联系人电话
			$api->patch('telephones/{telephone}', 'TelephoneController@update')->name('api.telephone.update');
			// 删除联系人电话
			$api->delete('telephones/{telephone}', 'TelephoneController@destroy')->name('api.telephone.destroy');

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


			// 分类列表
			$api->get('categories','RuleCategoriesController@index')->name('api.categories.index');
			// 某个类型分类
			$api->get('type/categories','RuleCategoriesController@typeIndex')->name('api.type.categories.index');
			// 创建分类
			$api->post('category','RuleCategoriesController@store')->name('api.category.store');
			// 分类详情
			$api->get('category/{category}','RuleCategoriesController@show')->name('api.category.show');
			// 更新分类
			$api->patch('category/{category}','RuleCategoriesController@update')->name('api.category.update');
			// 删除分类
			$api->delete('category/{category}','RuleCategoriesController@destroy')->name('api.category.destroy');


			// 守则列表
			$api->get('rules','RulesController@index')->name('api.rules.index');
			// 我的承诺
			$api->get('promise','RulesController@promise')->name('api.promise.index');
			// 守则详情
			$api->get('rule/{rule}','RulesController@show')->name('api.rules.show');
			// 创建守则
			$api->post('rule','RulesController@store')->name('api.rules.store');
			// 更新守则
			$api->patch('rule/{rule}','RulesController@update')->name('api.rules.update');
			// 删除守则
			$api->delete('rule/{rule}','RulesController@destroy')->name('api.rules.destroy');

			// 检查行李清单
			$api->post('users/{user}/rules/{rule}/examines','ExaminesController@store')->name('api.users.rules.examines.store');
			// 更新行李清单
			$api->patch('users/{user}/rules/{rule}/examines/{examine}','ExaminesController@update')->name('api.users.rules.examines.update');
			
			

			// 所有旅行团 人员安排
			$api->get('groups','GroupsController@index')->name('api.groups.index');
			// 单个旅行团 人员安排
			$api->get('travels/{travel}/groups','GroupsController@travelIndex')->name('api.travels.groups.index');
			// 单个用户分组安排
			$api->get('users/{user}/groups','GroupsController@userIndex')->name('api.users.groups.index');
			// 单个分组安排详情
			$api->get('users/{user}/travels/{travel}/groups/{group}','GroupsController@show')->name('api.users.travels.groups.show');
			// 增加分组安排
			$api->post('travel/{travel}/user/{user}/group','GroupsController@store')->name('api.group.store');
			// 更新分组安排
			$api->patch('travel/{travel}/user/{user}/group/{group}','GroupsController@update')->name('api.group.update');
			// 删除分组安排
			$api->delete('travel/{travel}/user/{user}/group/{group}','GroupsController@destroy')->name('api.group.destroy');


			// 所有行程安排
			$api->get('routes','RoutesController@index')->name('api.routes.index');
			// 旅行团下行程安排
			$api->get('travel/{travel}/routes','RoutesController@travelIndex')->name('api.travel.routes.index');
			// 行程详情
			$api->get('travel/{travel}/route/{route}','RoutesController@show')->name('api.travel.route.show');
			// 创建行程
			$api->post('travel/{travel}/route','RoutesController@store')->name('api.travel.route.store');
			// 更新行程
			$api->patch('travel/{travel}/route/{route}','RoutesController@update')->name('api.travel.route.update');
			// 删除行程
			$api->delete('travel/{travel}/route/{route}','RoutesController@destroy')->name('api.travel.route.destroy');


			// 所有景点安排
			$api->get('sceneries','SceneriesController@index')->name('api.sceneries.index');
			// 行程下所有景点安排
			$api->get('route/{route}/sceneries','SceneriesController@routeIndex')->name('api.route.sceneries.index');
			// 景点安排详情
			$api->get('route/{route}/scenery/{scenery}','SceneriesController@show')->name('api.route.scenery.show');
			// 创建景点安排
			$api->post('route/{route}/scenery','SceneriesController@store')->name('api.route.scenery.store');
			// 更新景点安排
			$api->patch('route/{route}/scenery/{scenery}','SceneriesController@update')->name('api.route.scenery.update');
			// 删除景点安排
			$api->delete('route/{route}/scenery/{scenery}','SceneriesController@destroy')->name('api.route.scenery.destroy');
			
			// 所有膳食安排
			$api->get('foods','FoodsController@index')->name('api.foods.index');
			// 行程下所有膳食安排
			$api->get('route/{route}/foods','FoodsController@routeIndex')->name('api.route.foods.index');
			// 膳食安排详情
			$api->get('route/{route}/food/{food}','FoodsController@show')->name('api.route.food.show');
			// 创建膳食安排
			$api->post('route/{route}/food','FoodsController@store')->name('api.route.food.store');
			// 更新膳食安排
			$api->patch('route/{route}/food/{food}','FoodsController@update')->name('api.route.food.update');
			// 删除膳食安排
			$api->delete('route/{route}/food/{food}','FoodsController@destroy')->name('api.route.food.destroy');

			// 学习工作纸列表
			$api->get('studies','StudiesController@index')->name('api.studies.index');
			// 行程下学习工作纸
			$api->get('routes/{route}/studies','StudiesController@routeIndex')->name('api.routes.studies.index');
			// 工作纸详情
			$api->get('routes/{route}/studies/{study}','StudiesController@show')->name('api.routes.studies.show'); 
			// 创建工作纸
			$api->post('routes/{route}/studies','StudiesController@store')->name('api.routes.studies.store');
			// 更新工作纸
			$api->patch('routes/{route}/studies/{study}','StudiesController@update')->name('api.routes.studies.update');
			// 删除工作纸
			$api->delete('routes/{route}/studies/{study}','StudiesController@destroy')->name('api.routes.studies.destroy');


			// 学习工作纸问题列表
			$api->get('questions','QuestionsController@index')->name('api.questions.index');
			// 行程下学习工作纸问题
			$api->get('studies/{study}/questions','QuestionsController@studyIndex')->name('api.studies.questions.index');
			// 用户下学习工作纸问题
			$api->get('users/{user}/questions', 'QuestionsController@userIndex')->name('api.users.questions.index');
			// 工作纸问题详情
			$api->get('studies/{study}/questions/{question}','QuestionsController@show')->name('api.studies.questions.show'); 
			// 创建工作纸问题
			$api->post('studies/{study}/questions','QuestionsController@store')->name('api.studies.questions.store');
			// 更新工作纸问题
			$api->patch('studies/{study}/questions/{question}','QuestionsController@update')->name('api.studies.questions.update');
			// 删除工作纸问题
			$api->delete('studies/{study}/questions/{question}','QuestionsController@destroy')->name('api.studies.questions.destroy');


			// 所有答案列表
			$api->get('answers','AnswersController@index')->name('api.answers.index');
			// 用户所有答案 
			$api->get('users/{user}/answers','AnswersController@userIndex')->name('api.users.answers.index');
			// 问题所有答案
			$api->get('questions/{question}/answers','AnswersController@questionIndex')->name('api.questions.answers.index');
			// 答案详情
			$api->get('questions/{question}/users/{user}/answers/{answer}','AnswersController@show')->name('api.questions.users.answers.show');
			// 创建答案
			$api->post('questions/{question}/users/{user}/answers','AnswersController@store')->name('api.questions.users.store');
			// 更新答案
			$api->patch('questions/{question}/users/{user}/answers/{answer}','AnswersController@update')->name('api.questions.users.answers.update');
			// 删除答案
			$api->delete('questions/{question}/users/{user}/answers/{answer}','AnswersController@destroy')->name('api.questions.users.answers.destroy');


			// 感想标题列表
			$api->get('titles','WriteTitlesController@index')->name('api.titles.index');
			// 标题详情
			$api->get('titles/{writetitle}','WriteTitlesController@show')->name('api.titles.show');
			// 增加感谢标题
			$api->post('titles','WriteTitlesController@store')->name('api.titles.store');
			// 更新标题
			$api->patch('titles/{writetitle}','WriteTitlesController@update')->name('api.titles.update');
			// 删除标题
			$api->delete('titles/{writetitle}','WriteTitlesController@destroy')->name('api.titles.destroy');


			// 所有感想
			$api->get('summaries','WritesController@index')->name('api.summaries.index');
			// 用户感想
			$api->get('users/{user}/summaries','WritesController@userIndex')->name('api.users.summaries.index');
			// 旅游感想
			$api->get('travels/{travel}/summaries','WritesController@travelIndex')->name('api.travels.summaries.index');
			// 用户旅游感想
			$api->get('users/{user}/travels/{travel}/writetitles/{title}','WritesController@show')->name('api.summaries.show');			
			// 创建感想
			$api->post('users/{user}/travels/{travel}/writetitles/{title}/summaries','WritesController@store')->name('api.users.travels.store');
			// 更新感想
			$api->patch('users/{user}/travels/{travel}/writetitles/{title}/summaries/{write}','WritesController@update')->name('api.users.travels.summaries.update');
			// 删除感想
			$api->delete('users/{user}/travels/{travel}/writetitles/{title}/summaries/{write}','WritesController@destroy')->name('api.users.travels.summaries.destroy');







		});





























	});
});







$api->version('v2', function($api) {
	$api->get('version', function() {
		return response('this is v2 version api');
	});
});
