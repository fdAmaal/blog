<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DB;
use Carbon\Carbon;
use App\Model\Post;
use App\Model\Comment;
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
            ->select('posts.*', 'categories.name')->withCount('comments')->paginate(9);

        return  view('Backend.posts.posts',compact('posts'));
        //return response()->json($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // using Eloquent method to insert data
        $categories=Category::all();
        return view('Backend.posts.new',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts= new Post;
        $posts->category_id=$request->category;
        $posts->title=$request->title;
        $posts->description=$request->Description;
        $posts->content= $request->Content;
        $posts->author_firstName=$request->Author_firstName;
        $posts->author_lastName=$request->Author_lastName;
        $posts->source_url=$request->source_url;

        //Upolad image
        $file = $request->file('img');
        $filePath = $file->store('images', 'public');
        $posts->img = $filePath;

        $posts->active=$request->active;
        $posts->save();
        return redirect('/admin/posts')
            ->with('success',200);
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

        //dd($post);
        return view('Backend.posts.post',compact('post'));


       /* $post=Post::find($id)
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name')->withCount('comments')
            ->where('posts.id',$id)->get()->first();
        /*$post=Post::with(['categories'])
            ->withCount('comments')
            ->where('posts.id',$id)
            ->paginate(9);
        $comments = $post->comments;
        return view('Backend.posts.post',compact('post','comments'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // using Eloquent method to edit data

        $post=Post::find($id)
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name')
            ->where('posts.id',$id)->get()->first();
        $categories=Category::all();
        return view('Backend.posts.edit',compact('post','categories'));
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
        // using Eloquent method to edit data
        $posts=Post::find($id);
        $posts->category_id=$request->category;
        $posts->title=$request->Title;
        $posts->description=$request->Description;
        $posts->content= $request-> Content;
        $posts->author_firstName=$request->Author_firstName;
        $posts->author_lastName=$request->Author_lastName;
        $posts->source_url=$request->source_url;

        //Upolad image
        if (!is_null($request->file('img'))) {
            $file = $request->file('img');
            $filePath = $file->store('images', 'public');
            $posts->img = $filePath;
        }

        $posts->active=$request->active;
        $posts->save();
        return redirect('/admin/posts')
            ->with('success',200);
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

    public function passive($id)
    {
        $posts=Post::find($id);
        $posts->active=0;
        $posts->save();
        return Redirect::back()->with('success', 'Post Activated successfully');
    }

    public function active($id)
    {
        $posts=Post::find($id);
        $posts->active=1;
        $posts->save();
        return Redirect::back()->with('success', 'disactivated successfully');
    }
}
