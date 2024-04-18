<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User as UserResource;

class AuthController extends Controller
{
    public function signup(Request $request) {
        $creds = [
            "name" => $request->input('name'),
            "email" => $request->input('email'),
            "password" => $request->input('password'),
            "password_confirmation" => $request->input('password_confirmation')
        ];

        if($creds['password'] != $creds['password_confirmation']) {
            return response()->json([
                'error' => 'Passwords do not match'
            ], 400);
        }

        $user = new User();
        $user->name = $creds['name'];
        $user->email = $creds['email'];
        $user->password = bcrypt($creds['password']);
        $user->save();

        return $this->login($request, $creds['email'], $creds['password']);
    }
    public function login(Request $request, $email = null, $password = null) {
        $creds = [
            'email' => $email,
            'password' => $password
        ];
        if($email == null || $password == null) {
            $creds = [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ];
        }

        if(!Auth::attempt($creds)) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 401);
        };

        $user = Auth::user();

        $generatedToken = $this->generateToken(); //bin2hex(random_bytes(256));

        while(UserToken::where('token', $generatedToken)->first()) {
            $generatedToken = bin2hex(random_bytes(64));
        }

        UserToken::where('user_id', $user->id)->delete();

        $token = new UserToken();
        $token->token = $generatedToken;
        $token->user_id = $user->id;
        $token->token_created_at = Carbon::now();
        $token->save();

        return response()->json([
            'token' => $generatedToken,
            'token_type' => 'bearer',
            'user' => new UserResource($user)
        ]);
    }

    public function generateToken() {
        $header = [
            "alg" => "HS256",
            "typ" => "JWT"
        ];
        $payload = [
            "sub" => "userid",
            "name" => "username"
        ];
        $secret = bin2hex(random_bytes(256));

        return hash_hmac('sha256', base64_encode(json_encode($header)) . "." . base64_encode(json_encode($payload)), $secret);
    }
}
