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
		// 注册获取短信验证码（手机号需唯一）
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
		// 重设密码
		$api->post('password/reset', 'ResetPasswordController@reset')->name('password.update');

		$api->get('test', 'ResetPasswordController@test');

		// 获取区号列表
		$api->get('areacode', 'AreacodesController@index')->name('api.areacodes.index');
		// 获取修改邮箱验证码
		$api->post('emailCodes','EmailCodesController@store')->name('api.emailCodes.store');

		// 测试极光推送
		$api->get('jpush','JpushsController@index')->name('api.Jpush.index');



		// 需要 token 验证的接口
		$api->group(['middleware' => 'api.auth'], function($api) {
			// 用户列表
			$api->get('userlist','UsersController@index')->name('api.user.index');
			// 管理员添加用户列表
			$api->get('users/{user}/userList', 'UsersController@userList')->name('api.user.userList');
			// 用户 ID 查询列表
			$api->post('users/{user}/userInfo', 'UsersController@userInfo')->name('api.user.userInfo');
			// 管理员所属学校用户列表
			$api->get('users/{user}/schoolUser', 'UsersController@schoolUser')->name('api.user.schoolUser');
			// 当前登录用户信息
			$api->get('user','UsersController@me')->name('api.user.show');
			// 访问图片资源
			$api->post('images','ImagesController@store')->name('api.images.store');
			// 个人编辑用户资料
			$api->patch('user','UsersController@update')->name('api.user.update');
			// 管理员添加用户并且分组
			$api->post('userGroup', 'UsersController@userGroup')->name('api.userGroup');
			// 管理员编辑用户资料
			$api->patch('users/{user}/groups/{group}/information', 'UsersController@information')->name('api.users.information');
			// 用户通知列表
			$api->get('user/notifications', 'NotificationsController@index')->name('api.user.notifications.index');
			// 通知统计
			$api->get('user/notifications/stats', 'NotificationsController@stats')->name('api.user.notifications.stats');
			// 标记通知为已读
			$api->patch('user/read/notifications', 'NotificationsController@read')->name('api.user.notifications.read');
			// 修改用户手机号码
			$api->patch('phone','UsersController@updatePhone')->name('api.user.updatePhone');
			// 修改用户邮箱地址
			$api->post('email','UsersController@editEmail')->name('api.user.editEmail');
			// 紧急求助
			$api->get('company/{company}/travel/{travel}/sos', 'UsersController@sos');


			// 所有学校列表
			$api->get('schools', 'SchoolsController@index')->name('api.school.index');
			// 显示学校信息
			$api->get('schools/{school}', 'SchoolsController@show')->name('api.school.show');
			// 创建学校信息
			$api->post('schools', 'SchoolsController@store')->name('api.school.store');
			// 编辑学校信息
			$api->patch('schools/{school}', 'SchoolsController@update')->name('api.school.update');
			// 删除学校信息
			$api->delete('schools/{school}', 'SchoolsController@destroy')->name('api.school.destroy');
			

			
			// 创建新闻
			$api->post('new','NewsController@store')->name('api.news.store');
			// 编辑新闻
			$api->patch('new/{new}','NewsController@update')->name('api.news.update');
			// 删除新闻	
			$api->delete('new/{new}','NewsController@destroy')->name('api.news.destroy');

			// 所有旅游项目列表
			$api->get('travels','TravelsController@index')->name('api.travel.index');
			// 创建人旅游项目列表
			$api->get('creater/travels', 'TravelsController@createrIndex')->name('api.travel.creater');
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
			// 旅游下所有航班
			$api->get('travels/{travel}/flights', 'FlightsController@travelIndex')->name('api.travels.flights.index');
			// 航班详情
			$api->get('flights/{flight}','FlightsController@show')->name('api.flights.show');
			// 新增航班
			$api->post('flights','FlightsController@store')->name('api.flights.store');	
			// 更新航班信息
			$api->patch('flights/{flight}','FlightsController@update')->name('api.flights.update');
			// 删除航班
			$api->delete('flights/{flight}','FlightsController@destroy')->name('api.flights.destroy');


			// 酒店信息
			$api->get('hotels','HotelsController@index')->name('api.hotels.index');
			// 旅游下酒店信息
			$api->get('travels/{travel}/hotels', 'HotelsController@travelIndex')->name('api.travels.hotels.index');
			// 酒店详情
			$api->get('hotels/{hotel}','HotelsController@show')->name('api.hotels.show');
			// 新增酒店
			$api->post('hotels','HotelsController@store')->name('api.hotels.store');
			// 更新酒店信息
			$api->patch('hotels/{hotel}','HotelsController@update')->name('api.hotels.update');
			// 删除酒店
			$api->delete('hotels/{hotel}','HotelsController@destroy')->name('api.hotels.destroy');


			// 领队老师
			$api->get('leaders', 'LeadersController@index')->name('api.leaders.index');
			// 旅游下领队老师
			$api->get('travels/{travel}/leaders', 'LeadersController@travelIndex')->name('api.travels.leaders.index');;
			// 领队老师详情
			$api->get('travels/{travel}/leaders/{assembly}', 'LeadersController@show')->name('api.leaders.show');
			// 添加领队老师
			$api->post('travels/{travel}/leaders', 'LeadersController@store')->name('api.leaders.store');
			// 编辑领队老师
			$api->patch('travels/{travel}/leaders/{assembly}', 'LeadersController@update')->name('api.leaders.update');
			// 删除领队老师
			$api->delete('travels/{travel}/leaders/{assembly}', 'LeadersController@destroy')->name('api.leaders.destroy');




			// 分类列表
			$api->get('categories', 'RuleCategoriesController@index')->name('api.categories.index');
			// 某个类型分类
			$api->get('type/categories', 'RuleCategoriesController@typeIndex')->name('api.type.categories.index');
			// 旅游团下守则分类
			$api->get('travels/{travel}/categories', 'RuleCategoriesController@travelIndex')->name('api.travels.categories.index');
			// 分类详情
			$api->get('categories/{category}', 'RuleCategoriesController@show')->name('api.categories.show');
			// 创建分类
			$api->post('travels/{travel}/categories', 'RuleCategoriesController@store')->name('api.categories.store');
			// 更新分类
			$api->patch('travels/{travel}/categories/{category}', 'RuleCategoriesController@update')->name('api.categories.update');
			// 删除分类
			$api->delete('travels/{travel}/categories/{category}', 'RuleCategoriesController@destroy')->name('api.categories.destroy');


			// 所有守则清单列表
			$api->get('rules', 'RulesController@index')->name('api.rules.index');
			// 旅游下清单
			$api->get('travels/{travel}/rules', 'RulesController@travelIndex')->name('api.travels.rules.index');
			// 我的承诺
			$api->get('travels/{travel}/promises', 'RulesController@promise')->name('api.travels.promises.index');
			// 守则详情
			$api->get('rules/{rule}', 'RulesController@show')->name('api.rules.show');
			// 创建守则
			$api->post('rules', 'RulesController@store')->name('api.rules.store');
			// 更新守则
			$api->patch('rules/{rule}', 'RulesController@update')->name('api.rules.update');
			// 删除守则 
			$api->delete('rules/{rule}', 'RulesController@destroy')->name('api.rules.destroy');
			// 行李清单列表
			$api->get('travels/{travel}/packages', 'RulesController@packages')->name('api.travels.packages.index');
			// 检查行李清单
			$api->post('users/{user}/rules/{rule}/examines', 'ExaminesController@store')->name('api.users.rules.examines.store');
			// 更新行李清单
			$api->patch('users/{user}/rules/{rule}/examines/{examine}', 'ExaminesController@update')->name('api.users.rules.examines.update');
			// 删除行李清单
			$api->delete('examines/{examine}', 'ExaminesController@destroy')->name('api.examines.destroy');
			
			

			// 所有旅行团 人员安排
			$api->get('groups','GroupsController@index')->name('api.groups.index');
			// 单个旅行团 人员安排
			$api->get('travels/{travel}/groups','GroupsController@travelIndex')->name('api.travels.groups.index');
			// 单个用户分组安排
			$api->get('users/{user}/groups','GroupsController@userIndex')->name('api.users.groups.index');
			// 单个分组安排详情
			$api->get('travels/{travel}/groups/{group}','GroupsController@show')->name('api.travels.groups.show');
			// 增加分组安排
			$api->post('users/{user}/travels/{travel}/groups','GroupsController@store')->name('api.group.store');
			// 更新分组安排
			$api->patch('users/{user}/travels/{travel}/groups/{group}','GroupsController@update')->name('api.group.update');
			// 删除分组安排
			$api->delete('users/{user}/travels/{travel}/groups/{group}','GroupsController@destroy')->name('api.group.destroy');
			


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
			// 旅游下所有学习工作纸
			$api->get('travels/{travel}/studies', 'StudiesController@travelIndex')->name('api.travels.studies.index');
			// 旅游下某用户学习工作纸
			$api->get('travels/{travel}/users/{user}/studies', 'StudiesController@travelUserIndex')->name('api.travels.users.studies.index');
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
			// 工作纸下学习工作纸问题
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
			$api->get('questions/{question}/answers/{answer}','AnswersController@show')->name('api.questions.users.answers.show');
			// 创建答案
			$api->post('questions/{question}/answers','AnswersController@store')->name('api.questions.store');
			// 更新答案
			$api->patch('questions/{question}/answers/{answer}','AnswersController@update')->name('api.questions.answers.update');
			// 删除答案
			$api->delete('questions/{question}/answers/{answer}','AnswersController@destroy')->name('api.questions.answers.destroy');


			// 感想标题列表
			$api->get('titles','WriteTitlesController@index')->name('api.titles.index');
			// 旅游下所有标题
			$api->get('travels/{travel}/titles', 'WriteTitlesController@travelIndex')->name('api.travels.titles.index');
			// 旅游下某用户所有标题
			$api->get('travels/{travel}/users/{user}/titles', 'WriteTitlesController@travelUserIndex')->name('api.travels.users.titles.index');
			// 标题详情
			$api->get('travels/{travel}/titles/{writetitle}','WriteTitlesController@show')->name('api.titles.show');
			// 增加标题
			$api->post('travels/{travel}/titles','WriteTitlesController@store')->name('api.titles.store');
			// 更新标题
			$api->patch('travels/{travel}/titles/{writetitle}','WriteTitlesController@update')->name('api.titles.update');
			// 删除标题
			$api->delete('travels/{travel}/titles/{writetitle}','WriteTitlesController@destroy')->name('api.titles.destroy');


			// 所有旅游所有感想
			$api->get('summaries','WritesController@index')->name('api.summaries.index');
			// 用户下所有感想
			$api->get('users/{user}/summaries','WritesController@userIndex')->name('api.users.summaries.index');
			// 旅游下所有感想
			$api->get('travels/{travel}/summaries','WritesController@travelIndex')->name('api.travels.summaries.index');
			// 用户单篇感想
			$api->get('users/{user}/travels/{travel}/writetitles/{title}','WritesController@show')->name('api.users.summaries.show');			
			// 创建感想
			$api->post('travels/{travel}/writetitles/{title}/summaries','WritesController@store')->name('api.travels.store');
			// 更新感想
			$api->patch('travels/{travel}/writetitles/{title}/summaries/{write}','WritesController@update')->name('api.travels.summaries.update');
			// 删除感想
			$api->delete('travels/{travel}/writetitles/{title}/summaries/{write}','WritesController@destroy')->name('api.travels.summaries.destroy');

			// 高德地图获取经纬度
			$api->post('geode','GeodesController@store')->name('api.geode.store');

			// 当地文化列表
			$api->get('locals', 'LocalsController@index')->name('api.locals.index');
			// 旅游下当地文化
			$api->get('travels/{travel}/locals', 'LocalsController@travelIndex')->name('api.travels.locals.index');
			// 当地文化详情
			$api->get('locals/{local}', 'LocalsController@show')->name('api.locals.show');
			// 创建当地文化
			$api->post('travels/{travel}/locals', 'LocalsController@store')->name('api.travels.locals.store');
			// 更新当地文化
			$api->patch('travels/{travel}/locals/{local}', 'LocalsController@update')->name('api.travels.lcoals.update');
			// 删除当地文化
			$api->delete('travels/{travel}/locals/{local}', 'LocalsController@destroy')->name('api.travels.locals.destroy');

			// 自我评估分类列表
			$api->get('evaluationCategories', 'EvaCategoriesController@index')->name('api.evaluationCategories.index');
			// 旅游下评估分类
			$api->get('travels/{travel}/evaluationCategories', 'EvaCategoriesController@travelIndex')->name('api.travels.evaluationCategories.index');
			// 旅游下某用户所有评估分类
			$api->get('travels/{travel}/users/{user}/evaluationCategories', 'EvaCategoriesController@travelUserIndex')->name('api.travels.users.evaluationCategories.index');
			// 评估分类详情
			$api->get('evaluationCategories/{category}', 'EvaCategoriesController@show')->name('api.evaluationCategories.show');
			// 创建评估分类
			$api->post('travels/{travel}/evaluationCategories', 'EvaCategoriesController@store')->name('api.travels.evaluationCategories.store');
			// 更新评估分类
			$api->patch('travels/{travel}/evaluationCategories/{category}', 'EvaCategoriesController@update')->name('api.travels.evaluationCategories.update');
			// 删除评估分类
			$api->delete('travels/{travel}/evaluationCategories/{category}', 'EvaCategoriesController@destroy')->name('api.travels.evaluationCategories.destroy');

			// 所有评估选项列表
			$api->get('evaluations', 'EvaluationsController@index')->name('api.evaluations.index');
			// 评估选项详情
			$api->get('evaluations/{evaluation}', 'EvaluationsController@show')->name('api.evaluations.show');
			// 创建评估选项
			$api->post('evaluationCategories/{category}/evaluations', 'EvaluationsController@store')->name('api.evaluations.store');
			// 编辑评估选项
			$api->patch('evaluationCategories/{category}/evaluations/{evaluation}', 'EvaluationsController@update')->name('api.evaluations.update');
			// 删除评估选项
			$api->delete('evaluationCategories/{category}/evaluations/{evaluation}', 'EvaluationsController@destroy')->name('api.evaluations.destroy');

			// 所有评估结果
			$api->get('evaluatedes', 'EvaluatesController@index')->name('api.evaluatedes.index');
			// 创建评估结果
			$api->post('evaluations/{evaluation}/evaluatedes', 'EvaluatesController@store')->name('api.evaluatedes.store');
			// 删除评估结果
			$api->delete('evaluations/{evaluation}/evaluatedes/{evaluate_user}', 'EvaluatesController@destroy')->name('api.evaluatedes.destroy');


			// 连接学校
			$api->post('users/{user}/schools/{school}', 'UserSchoolsController@store')->name('api.users.schools.store');
			// 移除学校
			$api->delete('users/{user}/schools/{school}', 'UserSchoolsController@destroy')->name('api.users.schools.destroy');


			// 聊天消息,绑定客户端和uid
			$api->post('users/{user}/bind', 'ChatsController@bind');
			// 发送消息
			$api->post('messages', 'ChatsController@messages');
			// 获取房间人员列表
			$api->post('rooms', 'ChatsController@room')->name('api.rooms');
			// 房间消息记录
			$api->get('groups/chats', 'ChatsController@group')->name('api.groups');


			// 更新用户最后位置
			$api->post('location', 'LocationsController@update')->name('api.location');
			// 旅游团下的人员定位信息
			$api->post('travels/{travel}/information', 'GroupsController@information')->name('api.group.information');
		});





	});
});







$api->version('v2', [
	'namespace' => 'App\Http\Controllers\Api',
	// 手动注册模型中间件
	'middleware' => ['serializer:array','bindings']
], function($api) {
	$api->group([
		'middleware' => 'api.throttle',
		'limit' => config('api.rate_limits.sign.limit'),
		'expires' => config('api.rate_limits.sign.expires'),
	], function ($api) {
		// 游客可访问接口
		// 注册获取短信验证码（手机号需唯一）
		$api->post('verificationCodes', 'VerificationCodesController@store_v2')->name('api.verificationCodes.store'); 
	});
});
