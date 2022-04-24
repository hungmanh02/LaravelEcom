@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sẩn phẩm
                </header>
                <div class="panel-body">
                    <?php $message=Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }  ?> 
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/save-brand') }}" method="POST">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea style="resize: none"  rows="8"class="form-control" name="brand_desc" id="exampleInputPassword1" placeholder="Mô tả thương hiệu"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiện thị</label>
                            <select class="form-control input-sm m-bot15" name="brand_status">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện thị</option>
                            </select>
                        </div>
                        
                        <button type="submit" name="add_brand" class="btn btn-info">Thêm danh mục</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
   
</div>
@endsection