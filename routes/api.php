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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('Auth/register', 'API\Auth\RegisterController@register');
Route::post('Auth/login', 'API\Auth\LoginController@login');
Route::post('refresh', 'Api\Auth\LoginController@refresh');


Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'Api\Auth\LoginController@logout');
    Route::post('/comments', 'API\CommentController@store');
    Route::post('/likes', 'API\LikeController@store');

  });


Route::resource('/categories', 'API\CategoryController');
Route::resource('/comments', 'API\CommentController');
Route::resource('/likes', 'API\LikeController');
Route::resource('/posts', 'API\PostController');
Route::resource('notifications', 'API\NotificationsController');
Route::resource('users', 'API\UserController');

