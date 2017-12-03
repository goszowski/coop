<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Area;

class AreasController extends Controller
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
            foreach(Area::where('name', 'like', '%'.$term.'%')->get() as $area)
            {
                $results[] = [
                    'id' => $area->id,
                    'text' => $area->present()->fullName,
                ];
            }
        }
        // End searching


        return response()->json([
          'results' => $results
        ]);
    }
}
