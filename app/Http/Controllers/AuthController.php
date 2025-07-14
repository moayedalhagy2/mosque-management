<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
 
use App\Http\Requests\LoginRequest;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\ExceptionService;
use App\Services\HelperService;

class AuthController extends Controller
{


    public function login(LoginRequest $request)
    {

        $info = $request->validated();

        $user = User::where('username', 'LIKE',$info['username'])->first();

        if ($user &&  password_verify($info['password'], $user->password)) {;

            $token = $user->createToken('auth_token')->plainTextToken;

            $user->auth = [
                'accessToken' =>  $token,
                'tokenType' => 'Bearer'
            ];

            return $this->successJson(new UserResource($user))
                ->withCookie(HelperService::cookieToken($token));
        } else {

            ExceptionService::invalidCredentials();
        }
    }

    


    public function logout()
    {
        auth()->user()?->currentAccessToken()->delete();

        return $this->successJson(null, 204)
            ->withCookie(HelperService::cookieToken('', true));
    }
}
