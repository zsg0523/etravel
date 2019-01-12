<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/register', function () {
    return view('register/Regiser');
});

Route::get('/login', function () {
    return view('login/Login');
});
Route::get('/projectDetail', function () {
    return view('pages/projectDetail');
});
Route::get('/linkSchool', function () {
    return view('pages/linkSchool');
});
Route::get('students', function () {
    return view('pages/students');
});
Route::get('/photo', function () {
    return view('pages/photo');
});
// dataBank
Route::get('/dataBank', function () {
    return view('pages/dataBank');
});
Route::get('/dataBank_phone', function () {
    return view('pages/dataBank_phone');
});
Route::get('/dataBank_rules', function () {
    return view('pages/dataBank_rules');
});
Route::get('/rulesInfo', function () {
    return view('pages/dataBank_rulesInfo');
});
Route::get('/promise', function () {
    return view('pages/dataBank_promise');
});
Route::get('/group', function () {
    return view('pages/dataBank_group');
});
Route::get('/localCulture', function () {
    return view('pages/dataBank_localCulture');
});
Route::get('/houseTable', function () {
    return view('pages/dataBank_houseTable');
});
Route::get('/luggageList', function () {
    return view('pages/dataBank_luggageList');
});
Route::get('/journey', function () {
    return view('pages/dataBank_journey');
});
Route::get('/journeyInfo', function () {
    return view('pages/dataBank_journeyInfo');
});
Route::get('/mealsInfo', function () {
    return view('pages/dataBank_mealsInfo');
});
// personalCenter
Route::get('/personalCenter', function () {
    return view('personalCenter/personalCenter');
});
Route::get('/password', function () {
    return view('personalCenter/personalCenter_password');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
