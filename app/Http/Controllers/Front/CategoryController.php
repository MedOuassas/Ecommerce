<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Maker;
use App\Model\Product;

class CategoryController extends Controller
{

    public function index($slug)
    {
        $categories = Category::all();
        $category = Category::whereSlug($slug)->first();
        $title = $category->categ_name_en;
        $description = $category->description;
        $keywords = $category->keywords;
        //$products = $category->products()->where('status', 'active')->get();
        $products = Product::where('status', 'active')->whereIn('category_id',explode(',', get_category_child($category->id)))->get();
        
        //$makers = $products->maker()->distinct('id')->get();
        $maker_arr= array();
        foreach ($products as $key => $product) {
            $maker_id = $product->maker_id;
            if(!in_array($maker_id, $maker_arr)) {
                $maker_arr[] = $maker_id;
            }
        }
        $makers = Maker::whereIn('id',$maker_arr)->get();
        
        return view(
            'front.category', [
                    'title' => $title,
                    'description' => $description,
                    'keywords' => $keywords,
                    'category' => $category,
                    'categories' => $categories,
                    'makers' => $makers,
                    'products' => $products
                ]
            );
    }

}
