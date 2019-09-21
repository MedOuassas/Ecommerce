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
        $categoriest = Category::with('products')->get();
        $categories_top = [];
        $products = [];
        foreach ($categoriest as $key => $category) {
            $products_top = Product::where(['status'=>'active', 'category_id'=>$category->id])->get();
            if(!empty(count($products_top))){
                array_push($categories_top, $category->categ_name_en);
                foreach ($products_top as $key => $product) {
                    array_push($products, json_decode($product, true));
                }
                //dd(json_encode($products_top, true));
            }
        }
        //dd($products);
        $posts = Post::where('status', 'active')->limit(3)->get();//->where('date', '>=', \Carbon\Carbon::now())
        return view('front.home', ['categories' => $categories, 'categories_top' => $categories_top, 'slides' => $slides, 'products' => $products, 'posts' => $posts]);
    }

}
