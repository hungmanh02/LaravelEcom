<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $category=DB::table('category_product')->where('category_status','1')->orderBy('id','desc')->get();
        $brand=DB::table('brand_product')->where('brand_status','1')->orderBy('id','desc')->get();
        $product=DB::table('product')->where('product_status','1')->orderByDesc('product_id')->limit(6)->get();
        return view('pages.home',['category'=>$category,'brand'=>$brand,'product'=>$product]);
    }
}
