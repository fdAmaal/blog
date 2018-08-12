<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use Validator;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $this->sendResponse($users->toArray(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'country' => 'required',
            'img' => 'required',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'

        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $users = Category::create($input);

        return $this->sendResponse($users->toArray(), 'Catgory created successfully.');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);

    if (is_null($user)) {
        return $this->sendError('category not found.');
    }

    return $this->sendResponse($user->toArray(), 'Category retrieved successfully.');
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
        $input = $request->all();
        $users = User::find($id);


        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'country' => 'required',
            'img' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $users->name = $input['name'];
        $users->img = $input['img'];
        $users->email = $input['email'];
        $users->country = $input['country'];
        $users->password = $input['password'];
        $users->save();


        return $this->sendResponse($users->toArray(), 'Post updated successfully.');
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
