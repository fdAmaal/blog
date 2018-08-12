<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DB;
use Carbon\Carbon;
use App\Model\Post;
use App\Model\Category;
use App\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::join('categories', 'category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name')
            ->withCount('comments')
            ->orderBy('created_at','desc')
            ->paginate(9)
           ;
        $categories = Category::withCount(['posts'])->get();


        return  view('home',compact('posts','categories'));
        //return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::with([
            'category',
            'comments' =>function($query){
            $query->withCount(['likes']);
            }
        ])
            ->withCount(['comments'])
            ->findOrFail($id);

        //return response()->json($post);
        $categories = Category::withCount(['posts'])->get();

        return view('Frontend.post.posts',compact('post', 'categories'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
