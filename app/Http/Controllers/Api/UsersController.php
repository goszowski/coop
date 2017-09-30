<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Session;

class UsersController extends Controller
{
    public function activate($email, $token)
    {
        $user = User::where('email', $email)->where('register_token', $token)->first();

        if(!$user)
        {
            return view('errors.forbidden');
        }

        $user->is_active = true;
        $user->register_token = null;
        $user->save();

        return view('messages.activation');
    }
}
