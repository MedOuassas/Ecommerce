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
        $categoriest = Category::all();
        $products = Product::where(['status'=>'active'])->get();

        $arr_cats_id = array();
        foreach ($products as $product) {
            in_array($product->category_id,$arr_cats_id)?'':array_push($arr_cats_id, $product->category_id);
        }

        $posts = Post::where('status', 'active')->limit(3)->get();//->where('date', '>=', \Carbon\Carbon::now())
        return view('front.home', ['categories' => $categories, 'arr_cats' => $arr_cats_id, 'categoriest' => $categoriest, 'slides' => $slides, 'products' => $products, 'posts' => $posts]);
    }

}
