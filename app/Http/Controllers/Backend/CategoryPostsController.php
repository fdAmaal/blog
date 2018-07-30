<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\Category;
use App\Model\Post;
use App\Model\Comment;

class CategoryPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function new($id){
        $category=Category::find($id);
        return view('Backend.categories.posts.newpost',compact('category'));
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
        $posts->author_name=$request->author_name;
        $posts->source_url=$request->source_url;

        //Upolad image
        $file = $request->file('img');
        $filePath = $file->store('images/posts', 'public');
        $posts->img = $filePath;

        $posts->active=$request->active;
        $posts->save();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Post Added successfully!');
        return redirect('categories/categoryPost')->with('success',200);
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
        return view('Backend.categories.posts.posts',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id)
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name')
            ->where('posts.id',$id)->get()->first();
        $categories=Category::all();
        return view('Backend.categories.posts.edit',compact('post','categories'));
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
        return redirect::back()->with('success',200);
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


        return Redirect::back()->with('disactivated', 'Post disactivated successfully');
    }

    public function active($id)
    {
        $posts=Post::find($id);
        $posts->active=1;
        $posts->save();

        return Redirect::back()->with('Activated', 'Post Activated successfully');
    }

}
