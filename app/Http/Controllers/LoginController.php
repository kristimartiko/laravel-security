<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //public function __construct() {
    //    $this->middleware('auth:api',['except' => ['login', 'register']]);
    //}

    public function login(Request $request) {
        /*$credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);*/

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        $token = auth()->attempt(compact('email', 'password'));

        if(!$token = auth()->attempt(compact('email', 'password'))) {
            return response()->json(['error' => 'Incorret email/password']);
        }
        return response()->json(['token' => $token]);
    }

    public function register(Request $request) {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            'role'=>'required'
        ]);
        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $role = $request->role;

        $valrequest = User::create(compact('name', 'email', 'password', 'role'));

        return response()->json([
            'message' => 'Great success',
            'valrequest' => $valrequest, 201
        ]);
    }

    public function getActualUser() {
        return auth()->user();
    }

    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }


}
