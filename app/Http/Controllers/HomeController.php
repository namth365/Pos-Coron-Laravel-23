<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home(){
        $categories = Category::orderBy('id','DESC')->get();
        $products= Product::orderBy('id','DESC')->where('status',1)->get();
        return view('website.home.home')->with(compact('categories','products'));
    }
    public function products(){
       
        $categories = Category::orderBy('id','DESC')->get();
        $products= Product::orderBy('id','DESC')->where('status',1)->get();
       
        return view('website.products.index')->with(compact('categories','products'));
    }
    public function product_detail($slug){
        $category = Category::orderBy('id','DESC')->get();
        $product = Product::where('slug',$slug)->first();
       
        return view('website.products.view')->with(compact('category','product'));
    }
    public function getSearch(Request $request) {
        
        $categories      = Category::all();
        $search = $request->search;
        if ($search) {
            $search = str_replace(' ','%', $search);
            $products = Product::where('name', 'like','%'.$search.'%')->get();
        } else {
            $products = Product::all();
        }
        $params = [
            'products'    => $products,
            'search_name' => $search,
            'categories'  => $categories,
            
        ];
        return view('website.include.search_bar', $params);
    }

}
