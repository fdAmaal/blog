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

class RegisterController extends Controller
{

    private $client;

    public function __construct()
    {
        $this->client = Client::find(1);
    }


    public function register(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'country' => 'required',
            'img' => 'required',
            'ip_address' => 'required',
            'password' => 'required|min:6|confirmed',
            'token' => 'required'
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'country' => request('country'),
            'img' => request('img'),
            'ip_address' => request('ip_address'),
            'password' => bcrypt(request('password')),
            'active' => 1,
            'is_admin' => 0
        ]);

        DB::table('usertokens')->where('token', request('token'))->update([
            'user_id' => $user->id,
        ]);

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
