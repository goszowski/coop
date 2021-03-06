<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function findbyEmail()
    {
        $results = [[
          'id' => 0,
          'text' => '---',
        ]];

        $query = request('q');
        $term = $query['term'] ?? null;


        // Searching
        if($term)
        {
            foreach(User::where('email', 'like', '%'.$term.'%')->get() as $user)
            {
                $results[] = [
                    'id' => $user->id,
                    'text' => $user->email . ' ('.$user->name.')',
                ];
            }
        }
        // End searching


        return response()->json([
          'results' => $results
        ]);
    }
}
