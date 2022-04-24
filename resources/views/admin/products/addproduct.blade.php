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
                        <form role="form" action="{{ URL::to('/save-product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="product_name" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình sản phẩm</label>
                            <input type="file" class="form-control" name="product_image" id="exampleInputEmail1" placeholder="Hình sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" class="form-control" name="product_price" id="exampleInputEmail1" placeholder="Giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="category_id">
                                @foreach ($category as $key => $cate )
                                <option value="{{ $cate->id }}" >{{ $cate->category_name }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="brand_id">
                                @foreach ($brand as $key => $brad )
                                <option value="{{ $brad->id }}" >{{ $brad->brand_name }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none"  rows="5"class="form-control" name="product_desc" id="exampleInputPassword1" placeholder="Mô tả sản phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea style="resize: none"  rows="3"class="form-control" name="product_content" id="exampleInputPassword1" placeholder="Nội dung sản phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiện thị</label>
                            <select class="form-control input-sm m-bot15" name="product_status">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện thị</option>
                            </select>
                        </div>
                        
                        <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection