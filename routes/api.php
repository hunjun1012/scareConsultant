<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//API컨트롤러 라우트 추가하기
Route::get('users', 'ApiController@users')->name('api.users');
Route::get('groups', 'ApiController@groups')->name('api.groups');

// Route::get('posts', 'ApiController@posts')->name('api.posts');