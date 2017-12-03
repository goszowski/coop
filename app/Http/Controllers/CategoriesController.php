<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoriesController extends Controller
{
    public function show($slug)
    {
    	$category = Category::whereSlug($slug)->firstOrFail();

    	$products = Product::where('category_id', $category->id);

    	foreach($category->descendants() as $descendantCategory)
    	{
    		$products = $products->orWhere('category_id', $descendantCategory->id);
    	}

    	$products = $products->ordered()->paginate();

    	return view('categories.show', compact('products'));
    }
}
