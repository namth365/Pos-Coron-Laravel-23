<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\PostRegisterRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class ShopController extends Controller
{
    public function index()
    {
      $products = Product::all();
      return view('website.carts.cart', compact('products'));
     }    
   public function erros(){
      $erros = Session::get('erros');
      return view('website.home.404',compact('erros'));
      }
   public function login(){
      return view('website.home.login');
   }

   public function postLogin(Request $request){
      $credentials = $request->only('email','password');
      if(Auth::guard('customer')->attempt($credentials))
      {   
         return redirect()->route('shop.my-account')->with('status','Đăng nhập thành công');
      }
         return redirect()->route('login')->with('status','Đăng nhập không thành công');
   }
   public function my_account(){
      $my_account = Session::get('my-account');
      return view('website.home.my-account',compact('my_account'));
}
   public function product_detail($id){
      $product_detail = Session::get('product_detail');
      return view('website.products.view', compact('product_detail'));
}
   public function products(){
      $products = Product::paginate(12);
      return view('website.products.index', compact('products'));
}
   public function questions(){
      return view('website.home.questions');
}
   public function category($slug){
      $category = Category::where('slug',$slug)->first(); 
      $id_category= $category->id;
      $products = Product::where('category_id',$id_category)->paginate();
      return view('website.products.index', compact('products'));
}
   public function register(){
      return view('website.home.register');
   }

   public function postRegister(PostRegisterRequest $request)
   {
      $customer = new Customer();
      $customer->name = $request->input('name');
      $customer->email = $request->input('email');
      $customer->phone = $request->input('phone');
      $customer->address = $request->input('address');
      $customer->save();

      return redirect()->route('home')->with('status','Đăng ký thành công');
   }
   public function search(){
      $search = $request->search;
      if ($search ){
         $products = $products->where('name','like','%'.$search.'%'); 
     }
     $products = $products->paginate(10);
      return view('website.products.index',compact('products'));
}



}