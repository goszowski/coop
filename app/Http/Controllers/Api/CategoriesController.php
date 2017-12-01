<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    public function findByName()
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
            foreach(Category::where('name', 'like', '%'.$term.'%')->get() as $category)
            {
                $results[] = [
                    'id' => $category->id,
                    'text' => $category->present()->fullName,
                ];
            }
        }
        // End searching


        return response()->json([
          'results' => $results
        ]);
    }
}
