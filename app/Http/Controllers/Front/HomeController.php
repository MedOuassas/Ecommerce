<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use App\Model\Slide;
use App\Model\Post;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::where('parent', null)->limit(8)->get();
        $slides = Slide::where('status', 'active')->get();
        $products = Product::where('status', 'active')->get();
        $posts = Post::where('status', 'active')->where('date', '>=', \Carbon\Carbon::now())->get();
        //return ['categories' => $categories, 'slides' => $slides, 'products' => $products, 'posts' => $posts];
        return view('front.home', ['categories' => $categories, 'slides' => $slides, 'products' => $products, 'posts' => $posts]);
    }

}
