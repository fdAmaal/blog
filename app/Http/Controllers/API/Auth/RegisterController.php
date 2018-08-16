<?php

namespace App\Http\Controllers\API\Auth;

use App\Model\Social;
use App\Model\Usertoken;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{

    private $client;

    public function __construct()
    {
        $this->client = Client::first();
    }


    public function register(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'country' => 'required',
            'img' => 'required',
            'ip_address' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'country' => request('country'),
            'ip_address' => request('ip_address'),
            'password' =>request('password') ,
            'active' => 1,
            'is_admin' => 0
        ]);

        if($request->img){

            $png_url = "user-".time().".png";
            $path = public_path()."/uploads/backend/users/".$png_url;
            $base=base64_decode($request->img);
            Image::make($base)->save($path);
            $user->img = $png_url;
            $user->save();
 
        }


        $params = [
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => request('email'),
            'password' => request('password'),
            'scope' => '*'
        ];

        $request->request->add($params);

        $proxy = Request::create('oauth/token', 'POST');

        return Route::dispatch($proxy);
    }
}
