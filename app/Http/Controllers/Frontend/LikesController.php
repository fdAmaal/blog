<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Like;

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

    public function like(Request $request){
        $like=new Like;
        // using Eloquent method to edit data


        $is_liked=Like::where('comment_id',$request ->comment_id)
            ->where('user_id',$request->user_id)->get() ;
            if (!is_null($is_liked)) {
                if($is_liked->like = 1){
                    $like->like=0;
                    $like->dislike=0;
                    $like->comment_id=$request->comment_id;
                    $like->user_id=$request->user_id;
                }
                else{
                    $like->like=1;
                    $like->dislike=0;
                   $like->comment_id=$request ->comment_id;
                    $like->user_id=$request ->user_id;
                }
            }
      

          //  return response()->json($like);
        $like->save();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Added Category successfully!');
        return redirect()->route('post.show',$request->post_id)->with('success',200);
  
    }

    public function dislike($post_id, $user_id){

    }
}
