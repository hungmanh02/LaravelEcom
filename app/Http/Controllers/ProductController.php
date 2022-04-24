<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
           return Redirect::to('/dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $category=DB::table('category_product')->orderBy('id','desc')->get();
        $brand=DB::table('brand_product')->orderBy('id','desc')->get();
        return view('admin.products.addproduct',['category'=>$category,'brand'=>$brand]);
    }
    public function all_product(){
        $this->AuthLogin();
        $data_product=DB::table('product')
        ->join('category_product','category_product.id','=','product.category_id')
        ->join('brand_product','brand_product.id','=','product.brand_id')
        ->orderby('product.product_id','desc')->get();
       
        return view('admin.products.allproduct',['data_product'=>$data_product]);
    }
    public function save_product(Request $request){
        $this->AuthLogin();
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_desc']=$request->product_desc;
        $data['product_price']=$request->product_price;
        $data['category_id']=$request->category_id;
        $data['brand_id']=$request->brand_id;
        $data['product_content']=$request->product_content;
        $data['product_status']=$request->product_status;
        $get_image=$request->file('product_image');
        if($get_image){
            
            $path_image='public/images/products';
            $image_name=$get_image->getClientOriginalName();
            $path=$request->file('product_image')->storeAs($path_image,$image_name);
            $data['product_image']=$image_name;
            DB::table('product')->insert($data);
            Session::put('message','thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        
        $data['product_image']='';
       
        DB::table('product')->insert($data);
        Session::put('message','thêm sản phẩm thành công');
        return Redirect::to('all-product');
        
        
    }
    public function unactive_product($id){
        $this->AuthLogin();
        DB::table('product')->where('product_id',$id)->update(['product_status'=>0]);
        Session::put('message','Ẩn product');
        return Redirect::to('all-product');
    }
    public function active_product($id){
        $this->AuthLogin();
        DB::table('product')->where('product_id',$id)->update(['product_status'=>1]);
        Session::put('message','Hiện thị product');
        return Redirect::to('all-product');
    }
    public function edit_product($id){
        $this->AuthLogin();
        $category=DB::table('category_product')->get();
        $brand=DB::table('brand_product')->get();
        $product=DB::table('product')->get();
        $edit_product=DB::table('product')->where('product_id',$id)->first();
       
        return view('admin.products.editproduct',['edit_product'=>$edit_product,'category'=>$category,'brand'=>$brand,'product'=>$product]);
    }
    public function update_product(Request $request, $id){
        $this->AuthLogin();
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_desc']=$request->product_desc;
        $data['product_price']=$request->product_price;
        $data['category_id']=$request->category_id;
        $data['brand_id']=$request->brand_id;
        $data['product_content']=$request->product_content;
        $data['product_status']=$request->product_status;
        $get_image=$request->file('product_image');
        if($get_image){
            
            $path_image='public/images/products';
            $image_name=$get_image->getClientOriginalName();
            $path=$request->file('product_image')->storeAs($path_image,$image_name);
            $data['product_image']=$image_name;
            DB::table('product')->where('product_id',$id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('add-product');
        }
        DB::table('product')->where('product_id',$id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');

    }
    public function delete_product($id){
        $this->AuthLogin();
        DB::table('product')->where('product_id',$id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }
    //end function admin
    public function show_product($id){
        $category=DB::table('category_product')->where('category_status','1')->orderBy('id','desc')->get();
        $brand=DB::table('brand_product')->where('brand_status','1')->orderBy('id','desc')->get();
        $product_detail=DB::table('product')
        ->join('category_product','category_product.id','=','product.category_id')
        ->join('brand_product','brand_product.id','=','product.brand_id')
        ->where('product_id',$id)->first();
        return view('admin.products.showproduct',['category'=>$category,'brand'=>$brand,'product_detail'=>$product_detail]);
    }

}
