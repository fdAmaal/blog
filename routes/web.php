<?php
use App\Model\Category;
use App\Model\Tag;
use App\Model\Post;
use App\User;
use Illuminate\Support\Facades\Input;
\Illuminate\Support\Facades\Auth::routes();


Route::resource('/','Frontend\PostsController');
Route::resource('home','Frontend\PostsController');
Route::any('home/search',function(){
    $search = Input::get ( 'search' );
    $posts = Post::where('title','LIKE','%'.$search.'%')
                        ->orWhere ( 'description', 'LIKE', '%' . $search . '%' )
                        ->orWhere ( 'content', 'LIKE', '%' . $search . '%' )
                        ->orWhere ( 'author_name', 'LIKE', '%' . $search . '%' )
                        ->where('active', 1)
                        ->paginate(9);
    $categories = Category::where('active', 1)->get();
    if(count($posts) > 0)
        return view('Frontend.search')->withDetails($posts)->withQuery ( $search );
    else return view ('Frontend.search')->withMessage('No Details found. Try to search again !');
});


//Frontend

Route::middleware(['user','auth'])->group(function (){
    Route::resource('comment','Frontend\CommentsController');
    Route::post('post/comments/{comment_id}/like','Frontend\LikesController@like');
    Route::post('post/comments/{comment_id}/dislike','Frontend\LikesController@dislike');
});

Route::resource('category','Frontend\CategoriesController');
Route::resource('post','Frontend\PostsController');




//auth
    Auth::routes();

// Backend routes
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
    Route::any('categories/search',function(){
        $searchPost = Input::get ( 'search' );
        $posts = Category::where('name','LIKE','%'.$searchPost.'%')
                            ->paginate(9);
        if(count($posts) > 0)
            return view('Backend.categories.Searchcategories')->withDetails($posts)->withQuery ( $searchPost );
        else return view ('Backend.categories.Searchcategories')->withMessage('No Details found. Try to search again !');
    });


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
    Route::resource('tags','Backend\TagsController');
    Route::get('posts/{id}/passive','Backend\PostsController@passive');
    Route::get('posts/{id}/active','Backend\PostsController@active');
    Route::any('posts/search',function(){
        $searchPost = Input::get ( 'search' );
        $posts = Post::where('title','LIKE','%'.$searchPost.'%')
                            ->orWhere ( 'description', 'LIKE', '%' . $searchPost . '%' )
                            ->orWhere ( 'content', 'LIKE', '%' . $searchPost . '%' )
                            ->orWhere ( 'author_name', 'LIKE', '%' . $searchPost . '%' )
                            ->paginate(9);
        if(count($posts) > 0)
            return view('Backend.posts.Searchposts')->withDetails($posts)->withQuery ( $searchPost );
        else return view ('Backend.posts.Searchposts')->withMessage('No Details found. Try to search again !');
    });

    //comments
    Route::resource('comments','Backend\CommentsController');
    Route::get('posts/comments/{id}/passive','Backend\CommentsController@passive');
    Route::get('posts/comments/{id}/active','Backend\CommentsController@active');

    //users
    Route::resource('users','Backend\UserController');
    Route::get('users/{id}/passive','Backend\UserController@passive');
    Route::get('users/{id}/active','Backend\UserController@active');
    Route::any('users/search',function(){
        $search = Input::get ( 'search' );
        $users = User::Where ( 'email', 'LIKE', '%' . $search . '%' )
                      ->orWhere ( 'name', 'LIKE', '%' . $search . '%' )
                      ->orWhere ( 'country', 'LIKE', '%' . $search . '%' )
                      ->paginate(9);
        if(count($users) > 0)
            return view('Backend.users.Searchusers')->withDetails($users)->withQuery ( $search );
        else return view ('Backend.posts.Searchusers')->withMessage('No Details found. Try to search again !');
    });

});

