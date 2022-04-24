@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa danh mục sẩn phẩm
                </header>
                <div class="panel-body">
                    <?php $message=Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }  ?> 
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/update-category/'.$edit_category->id) }}" method="POST">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" name="category_name" value="{{ $edit_category->category_name}}" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none"  rows="8"class="form-control" name="category_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{ $edit_category->category_desc }}</textarea>
                        </div>
                    
                        
                        <button type="submit" name="update_category" class="btn btn-info">Cập nhật danh mục</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection