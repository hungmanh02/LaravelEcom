<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function save_cart(Request $request){
        $productId=$request->productid_hidden;
        $quantity=$request->qty;
        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::destroy();
        
        $product_info=DB::table('product')->where('product_id',$productId)->first();
        $data['id']=$product_info->product_id;
        $data['qty']=$quantity;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price;
        $data['weight']=$product_info->product_price;
        $data['options']['image']=$product_info->product_image;
        Cart::add($data);
        return Redirect::to('/show-cart');
        
    }
    public function show_cart(){
      return view('pages.cart.show_cart');
    }
    public function delete_to_cart($rowId){
      Cart::remove($rowId);
      return Redirect::to('show-cart');
    }
    public function congsoluong(Request $request, $rowId){
      $content=Cart::content();
      foreach($content as $content_qty){

      }
      
      // dd($content);
      Cart::update($rowId,$content_qty->qty +=1 );
      return Redirect::to('show-cart');
    }
    public function trusoluong(Request $request, $rowId){
      $content=Cart::content();
      foreach($content as $content_qty){

      }
      
    
      Cart::update($rowId,$content_qty->qty -1 );
      return Redirect::to('show-cart');
    }
}
