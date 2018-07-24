<?php


Route::get('/', function () {
    return view('welcome');
});

//auth
    Auth::routes();
Route::get('/home', function(){
    return view('home');
});

// Route::get('/home', 'HomeController@index')->name('home');
    //Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
    //Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

/*
//Backend
Route::get('/', function(){
    return view('auth.adminLogin');
});

Route::get('/login', function(){
    return view('auth.adminLogin');
});
*/

\Illuminate\Support\Facades\Auth::routes();

// Admin routes
Route::prefix('admin')->group(function() {

    Route::get('/', function(){
        return view('auth.adminLogin');
    });

    Route::get('/index', function(){
        return view('Backend.index');
    });

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

    Route::get('notifications', function(){
        return view('Backend.notifications');
    });
    Route::get('login', function(){
        return view('auth.adminLogin');
    });

    //categories
    Route::resource('categories','Backend\CategoriesController');
    Route::get('/categories/{id}/passive','Backend\CategoriesController@passive');
    Route::get('/categories/{id}/active','Backend\CategoriesController@active');
    Route::get('categories/categoryPost/{id}','Backend\CategoriesController@post');

    //posts
    Route::resource('posts','Backend\PostsController');
    Route::get('/posts/{id}/passive','Backend\PostsController@passive');
    Route::get('/posts/{id}/active','Backend\PostsController@active');

    //comments
    Route::resource('/comments','Backend\CommentsController');
    Route::get('/comments/{id}/passive','Backend\CommentsController@passive');
    Route::get('/comments/{id}/active','Backend\CommentsController@active');

    //users
    Route::resource('users','Backend\UserController');
    Route::get('/users/{id}/passive','Backend\UserController@passive');
    Route::get('/users/{id}/active','Backend\UserController@active');

});

//Frontend

