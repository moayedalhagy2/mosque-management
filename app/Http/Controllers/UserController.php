<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function profile(Request $request)
    {

        return $this->successJson(new UserResource(auth()->user()));
    }
}
