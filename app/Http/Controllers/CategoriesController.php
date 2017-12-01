<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function show($slug)
    {
    	$category = Category::whereSlug($slug)->firstOrFail();

    	return view('categories.show');
    }
}
