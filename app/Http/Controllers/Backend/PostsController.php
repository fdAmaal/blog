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
            ->select('posts.*', 'categories.name')
            ->withCount('comments')
            ->orderBy('created_at','desc')
            ->paginate(9)
           ;

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

        $this->validate($request, [
            'category'             => 'required|min:3|max:50|unique:categories,name',
            'title'             => 'required|max:2000|mimes:jpeg,bmp,png,jpg,gif',
            'Description'             => 'required|min:60|max:500',
            'Content'             => 'required|min:120|max:2000',
            'author_name'             => 'required|max:70',
            'author_img'             => 'required|max:2000|mimes:jpeg,bmp,png,jpg,gif',
            'source_url'             => 'required',
        ]);

        $posts= new Post;
        $posts->category_id=$request->category;
        $posts->title=$request->title;
        $posts->description=$request->Description;
        $posts->content= $request->Content;
        $posts->author_name=$request->author_name;
        $posts->author_name=$request->author_img;
        $posts->source_url=$request->source_url;

        //Upolad image
        $file = $request->file('img');
        $filePath = $file->store('images/posts', 'public');
        $posts->img = $filePath;

        //Upolad author_image
        $file = $request->file('author_img');
        $filePath = $file->store('images/posts', 'public');
        $posts->img = $filePath;

        $posts->active=$request->active;
        $posts->save();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Post Added successfully!');
        return redirect('/admin/posts')->with('success',200);
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
        $posts->author_name=$request->author_name;
        $posts->source_url=$request->source_url;

        //Upolad image
        if (!is_null($request->file('img'))) {
            $file = $request->file('img');
            $filePath = $file->store('images/posts', 'public');
            $posts->img = $filePath;
        }

        $posts->active=$request->active;
        $posts->save();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Post updated successfully!');
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


        return Redirect::back()->with('disactivated', 'disactivated successfully');
    }

    public function active($id)
    {
        $posts=Post::find($id);
        $posts->active=1;
        $posts->save();

        return Redirect::back()->with('Activated', 'Post Activated successfully');
    }
}
