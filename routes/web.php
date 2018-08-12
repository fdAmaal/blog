<?php

\Illuminate\Support\Facades\Auth::routes();


Route::resource('/','Frontend\PostsController');
Route::resource('home','Frontend\PostsController');


//Frontend

Route::middleware(['user','auth'])->group(function (){
    Route::resource('comments','Frontend\CommentsController');
    Route::post('comments/{comment_id}/like','Frontend\LikesController@like');
    Route::post('comments/{comment_id}/dislike','Frontend\LikesController@dislike');
});

Route::resource('category','Frontend\CategoriesController');
Route::resource('post','Frontend\PostsController');



//auth
    Auth::routes();

// Admin routes
Route::prefix('admin')->middleware('admin')->group(function() {

    Route::get('/', function(){
        return view('Backend.index');
    });

    Route::get('dashboard', function(){
        return view('Backend.index');
    });

    Route::get('notifications', function(){
        return view('Backend.notifications');
    });


    //categories
    Route::resource('categories','Backend\CategoriesController');
    Route::get('categories/{id}/passive','Backend\CategoriesController@passive');
    Route::get('categories/{id}/active','Backend\CategoriesController@active');

        //category posts
        Route::resource('categories/categoryPosts','Backend\CategoryPostsController');
        Route::get('categories/categoryPost/{id}','Backend\CategoryPostsController@show');
        Route::get('categories/categoryPost/{id}/new','Backend\CategoryPostsController@new');
        Route::get('categories/categoryPost/{id}/passive','Backend\CategoryPostsController@passive');
        Route::get('categories/categoryPost/{id}/active','Backend\CategoryPostsController@active');

        //category post comments
        Route::resource('/comments','Backend\CommentsController');
        Route::get('/categories/categoryPost/comments/{id}/passive','Backend\CommentsController@passive');
        Route::get('/categories/categoryPost/comments/{id}/active','Backend\CommentsController@active');

    //posts
    Route::resource('posts','Backend\PostsController');
    Route::get('posts/{id}/passive','Backend\PostsController@passive');
    Route::get('posts/{id}/active','Backend\PostsController@active');

    //comments
    Route::resource('comments','Backend\CommentsController');
    Route::get('posts/comments/{id}/passive','Backend\CommentsController@passive');
    Route::get('posts/comments/{id}/active','Backend\CommentsController@active');

    //users
    Route::resource('users','Backend\UserController');
    Route::get('users/{id}/passive','Backend\UserController@passive');
    Route::get('users/{id}/active','Backend\UserController@active');

});

