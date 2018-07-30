<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Model\Category;
use App\Model\Post;
use App\Model\Comment;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::orderBy('created_at','desc')->get();

        return view('Backend.categories.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // using Eloquent method to insert data
        return view('Backend.categories.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $category=new Category;
        // using Eloquent method to edit data
        $category->name=$request->name;
        $category->active=$request ->active;
        //Upolad image
        if (!is_null($request->file('img'))) {
            $file = $request->file('img');
            $filePath = $file->store('images/categories', 'public');
        }
        $category->img = $filePath;
        $category->active=$request->active;
        $category->save();
        return redirect('/admin/categories')
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

        $categories=Category::find($id)->withCount('posts')
            ->where('id',$id)
            ->get()->first();

       $posts = $categories->posts;
        return view('Backend.categories.category',compact('posts','categories'));
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
        $category=Category::find($id);
        return view('Backend.categories.edit',compact('category'));
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
        $category=Category::find($id);
        $category->name=$request->name;
        $filePath =$category->img;

        //Upolad image
        if (!is_null($request->file('img'))) {
            $file = $request->file('img');
            $filePath = $file->store('images/categories', 'public');
        }
        $category->img = $filePath;
        $category->active=$request->active;
        $category->save();
        return redirect('/admin/categories')
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
        $category=Category::find($id);
        $category->active=0;
        $category->save();
        return Redirect::back()->with('success', 'Category Activated successfully');
    }

    public function active($id)
    {
        $category=Category::find($id);
        $category->active=1;
        $category->save();
        return Redirect::back()->with('success', 'Category disactivated successfully');
    }

    public function post($id)
    {
        $post=Post::find($id)
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.name')->withCount('comments')
            ->where('posts.id',$id)->get()->first();
        $comments = $post->comments;
        //return response()->json($post);
        return view('Backend.categories.posts',compact('post','comments'));
    }
}
