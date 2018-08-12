<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikesController extends Controller
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function like($comment_id, $user_id){
        $like=new Like;
        // using Eloquent method to edit data

        $is_liked=Like::where('comment_id',$comment_id)
            ->where('user_id',$user_id) ;
        if($is_liked->like === 1){
            $like->like=0;
            $like->dislike=0;
            $like->comment_id=$comment_id;
            $like->user_id=$user_id;
        }
        else{
            $like->like=1;
            $like->dislike=0;
            $like->comment_id=$comment_id;
            $like->user_id=$user_id;
        }


        $like->save();
        return redirect::back()
            ->with('success',200);
    }

    public function dislike($post_id, $user_id){

    }
}
