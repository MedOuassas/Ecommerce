<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;

class CategoryController extends Controller
{

    public function index($slug)
    {
        $categories = Category::all();
        $category = Category::whereSlug($slug)->first();
        $products = $category->products()->get();
        
        return view('front.category', ['category' => $category, 'categories' => $categories, 'products' => $products]);
    }

}
