<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Auth::routes();


Route::group(['middleware' => 'auth', 'prefix' => '/'], function () {
    
});


// Route::get('{first}/{second}', 'RoutingController@secondLevel')->name('second');
// Route::get('{any}', 'RoutingController@root')->name('any');

// landing
Route::get('', 'RoutingController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// 세선 컨트롤러
Route::post('auth/login', 'SessionsController@login')->name('user.login');
Route::get('auth/logout', 'SessionsController@destroy')->name('user.destroy');

//라우팅 컨트롤러
Route::get('dashboard/temperature', 'RoutingController@dashboard_temperature')->name('dashboard.temperature');
Route::get('dashboard/contactor', 'RoutingController@dashboard_contactor')->name('dashboard.contactor');
Route::get('dashboard/notice', 'RoutingController@dashboard_notice')->name('dashboard.notice');
Route::get('dashboard/sit', 'RoutingController@dashboard_sit')->name('dashboard.sit');
Route::get('dashboard/all', 'RoutingController@dashboard_all')->name('dashboard.all');

//회원가입
Route::post('dashboard-user-management', 'UsersController@store')->name('user.store');

//상담원 정보관리 수정,삭제 게시판
Route::get('/information', 'RoutingController@dashboard_information')->name('dashboard.information');
Route::DELETE('/information/{user}','UsersController@destroy')->name('information.destroy');
// Route::post('/information/{user}','UsersController@show')->name('information.show');
Route::get('/information/{user}/edit','UsersController@edit')->name('information.edit');
Route::PATCH('information/{user}','UsersController@update')->name('information.update');

//공지사항 게시판
Route::get('/posts','PostsController@index')->name('posts.index1');
Route::get('/posts/create','PostsController@create')->name('posts.create');
Route::post('/posts/store', 'PostsController@store')->name('posts.store');
Route::DELETE('posts/{post}','PostsController@destroy')->name('posts.destroy');
Route::post('/posts/{post}','PostsController@show')->name('posts.show');
Route::get('/posts/{post}/edit','PostsController@edit')->name('posts.edit');
Route::PATCH('posts/{post}','PostsController@update')->name('posts.update');

//점심,출근 시간 게시판
Route::get('/schedules','SchedulesController@index')->name('schedules.index');
Route::get('/schedules/create','SchedulesController@create')->name('schedules.create');
Route::post('/schedules/store', 'SchedulesController@store')->name('schedules.store');
Route::DELETE('schedules/{schedule}','SchedulesController@destroy')->name('schedules.destroy');
Route::post('/schedules/{schedule}','SchedulesController@show')->name('schedules.show');
Route::get('/schedules/{schedule}/edit','SchedulesController@edit')->name('schedules.edit');
Route::PATCH('schedules/{schedule}','SchedulesController@update')->name('schedules.update');
	

Route::get('{any}', 'RoutingController@root')->name('any');
Route::get('{first}/{second}', 'RoutingController@secondLevel')->name('second');
// Route::group(['middleware' => 'auth', 'prefix' => '/'], function () {
// Route::get('{first}/{second}/{third}', 'RoutingController@thirdLevel')->name('third');
// });
