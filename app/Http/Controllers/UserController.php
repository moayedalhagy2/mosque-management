<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function profile(Request $request)
    {
        $user = auth()->user();

        $user->load(['branch']);

        return $this->successJson(new UserResource($user));
    }
}
