<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Region;

class RegionsController extends Controller
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
            foreach(Region::where('name', 'like', '%'.$term.'%')->get() as $region)
            {
                $results[] = [
                    'id' => $region->id,
                    'text' => $region->name,
                ];
            }
        }
        // End searching


        return response()->json([
          'results' => $results
        ]);
    }
}
