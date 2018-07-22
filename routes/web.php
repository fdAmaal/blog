<?php

//auth
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function(){
    return view('Backend.index');//->middleware('auth');
});
//Backend
    Route::get('/admin', function(){
        return view('auth.adminLogin');//->middleware('auth');
    });
    Route::get('/admin/login', function(){
        return view('auth.adminLogin');//->middleware('auth');
    });

    Route::get('index', function(){
        return view('Backend.index');//->middleware('auth');
    });

    Route::get('/admin/notifications', function(){
        return view('Backend.notifications');//->middleware('auth');
    });

    //categories
        route::resource('/admin/categories','Backend\CategoriesController');//->middleware('auth');
        route::get('/admin/categories/{id}/passive','Backend\CategoriesController@passive');//->middleware('auth');
        route::get('/admin/categories/{id}/active','Backend\CategoriesController@active');//->middleware('auth');

    //posts
        route::resource('/admin/posts','Backend\PostsController');//->middleware('auth');
        route::get('/admin/posts/{id}/passive','Backend\PostsController@passive');//->middleware('auth');
        route::get('/admin/posts/{id}/active','Backend\PostsController@active');//->middleware('auth');

    //comments
        route::resource('/admin/comments','Backend\CommentsController');//->middleware('auth');

    //users
        route::resource('/admin/users','Backend\UsersController');//->middleware('auth');


//Frontend

