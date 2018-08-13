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
        $categories= Category::orderBy('created_at','desc')
            ->withCount(['posts'])
            ->paginate(7);

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

        $this->validate($request, [
            'name'             => 'required|min:3|max:50|unique:categories,name',
            'img'             => 'required|max:2000|mimes:jpeg,bmp,png,jpg,gif',
        ]);

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

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Added Category successfully!');
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
        $categories=Category::with([
            'posts' =>function($query){
            $query->withCount(['comments']);
            }
        ])
        ->withCount(['posts'])
        ->orderBy('created_at','desc')
        ->findOrFail($id);



        if (is_null($categories)) {
            return $this->sendError('category not found.');
        }
        //return response()->json($categories);
        return view('Backend.categories.category',compact('categories'));
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
        $this->validate($request, [
            'name'    => 'required|min:3|max:50|unique:categories,name,'.$id,
        ]);

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

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Category updated successfully!');
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
        return Redirect::back()->with('disactivated', 'Category disactivated successfully');
    }

    public function active($id)
    {
        $category=Category::find($id);
        $category->active=1;
        $category->save();
        return Redirect::back()->with('Activated', 'Category Activated successfully');
    }





}
