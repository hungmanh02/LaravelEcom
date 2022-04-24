<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();
class CategoryProductController extends Controller
{
    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
           return Redirect::to('/dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category(){
        $this->AuthLogin();
        return view('admin.categories.addcategory');
    }
    public function all_category(){
        $this->AuthLogin();
        $data_category=DB::table('category_product')->get();
       
        return view('admin.categories.allcategory',['data_category'=>$data_category]);
    }
    public function save_category(Request $request){
        $this->AuthLogin();
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_desc']=$request->category_desc;
        $data['category_status']=$request->category_status;
        DB::table('category_product')->insert($data);
        Session::put('message','thêm danh mục thành công');
        return Redirect::to('add-category');
        
        
    }
    public function unactive_category($id){
        $this->AuthLogin();
        DB::table('category_product')->where('id',$id)->update(['category_status'=>0]);
        Session::put('message','Ẩn category');
        return Redirect::to('all-category');
    }
    public function active_category($id){
        $this->AuthLogin();
        DB::table('category_product')->where('id',$id)->update(['category_status'=>1]);
        Session::put('message','Hiện thị category');
        return Redirect::to('all-category');
    }
    public function edit_category($id){
        $this->AuthLogin();
        $edit_category=DB::table('category_product')->where('id',$id)->first();
        return view('admin.categories.editcategory',['edit_category'=>$edit_category]);
    }
    public function update_category(Request $request, $id){
        $this->AuthLogin();
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_desc']=$request->category_desc;
        DB::table('category_product')->where('id',$id)->update($data);
        Session::put('message','Cập nhật danh mục thành công');
        return Redirect::to('all-category');

    }
    public function delete_category($id){
        $this->AuthLogin();
        DB::table('category_product')->where('id',$id)->delete();
        Session::put('message','Xóa danh mục thành công');
        return Redirect::to('all-category');
    }
    //end function admin pages
    public function show_category_home($id){
        $category=DB::table('category_product')->where('category_status','1')->orderBy('id','desc')->get();
        $brand=DB::table('brand_product')->where('brand_status','1')->orderBy('id','desc')->get();
        $category_by_id=DB::table('product')->join('category_product','product.category_id','=','category_product.id')
        ->where('product.category_id',$id)->get();
        $category_name=DB::table('category_product')->where('category_product.id',$id)->first();
        return view('admin.categories.show_category',['category'=>$category,'brand'=>$brand,'category_by_id'=>$category_by_id,'category_name'=>$category_name]);
    }
}
