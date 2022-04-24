<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
class BrandProductController extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
           return Redirect::to('/dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_brand(){
        $this->AuthLogin();
        return view('admin.brands.addbrand');
    }
    public function all_brand(){
        $this->AuthLogin();
        $data_brand=DB::table('brand_product')->get();
       
        return view('admin.brands.allbrand',['data_brand'=>$data_brand]);
    }
    public function save_brand(Request $request){
        $this->AuthLogin();
        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['brand_desc']=$request->brand_desc;
        $data['brand_status']=$request->brand_status;
        DB::table('brand_product')->insert($data);
        Session::put('message','thêm thương hiệu thành công');
        return Redirect::to('add-brand');
        
        
    }
    public function unactive_brand($id){
        $this->AuthLogin();
        DB::table('brand_product')->where('id',$id)->update(['brand_status'=>0]);
        Session::put('message','Ẩn brand');
        return Redirect::to('all-brand');
    }
    public function active_brand($id){
        $this->AuthLogin();
        DB::table('brand_product')->where('id',$id)->update(['brand_status'=>1]);
        Session::put('message','Hiện thị brand');
        return Redirect::to('all-brand');
    }
    public function edit_brand($id){
        $this->AuthLogin();
        $edit_brand=DB::table('brand_product')->where('id',$id)->first();
        return view('admin.brands.editbrand',['edit_brand'=>$edit_brand]);
    }
    public function update_brand(Request $request, $id){
        $this->AuthLogin();
        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['brand_desc']=$request->brand_desc;
        DB::table('brand_product')->where('id',$id)->update($data);
        Session::put('message','Cập nhật thương hiệu thành công');
        return Redirect::to('all-brand');

    }
    public function delete_brand($id){
        $this->AuthLogin();
        DB::table('brand_product')->where('id',$id)->delete();
        Session::put('message','Xóa thương hiệu thành công');
        return Redirect::to('all-brand');
    }
    //end function admin pages
    public function show_brand_home($id){
        $category=DB::table('category_product')->where('category_status','1')->orderBy('id','desc')->get();
        $brand=DB::table('brand_product')->where('brand_status','1')->orderBy('id','desc')->get();

        $brand_by_id=DB::table('product')->join('brand_product','product.brand_id','=','brand_product.id')
        ->where('product.brand_id',$id)->get();
        $brand_name=DB::table('brand_product')->where('brand_product.id',$id)->first();

        return view('admin.brands.show_brand',['category'=>$category,'brand'=>$brand,'brand_by_id'=>$brand_by_id,'brand_name'=>$brand_name]);
    }
}
