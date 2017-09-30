<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Session;
use App\Notifications\ActivationComplete;

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

        $user->notify(new ActivationComplete);

        return view('messages.activation');
    }
}
