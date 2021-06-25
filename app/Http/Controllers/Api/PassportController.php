<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class PassportController extends Controller
{
    public function register(Request $request)
    {
        $params = $request->validate([
           'email' => 'required',
           'name' => 'required',
            'password' => 'required'
        ]);
        $params['password'] = bcrypt($request->password);

        $user = User::create($params);

        $accesToken = $user->createToken('token')->accessToken;

        return response()->json(['user' => $user, 'access_token' => $accesToken]);

    }

    public function login(Request $request)
    {
        $params = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(!auth()->attempt($params)){
            return response()->json(['msg' => 'not attempt']);
        }
        $acces_token = auth()->user()->createToken('token')->accessToken;
        return response()->json(['user' => auth()->user(), 'access_token' => $acces_token]);

    }
}
