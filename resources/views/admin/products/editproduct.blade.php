@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa thương hiệu sẩn phẩm
                </header>
                <div class="panel-body">
                    <?php $message=Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }  ?> 
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/update-product/'.$edit_product->product_id) }}" method="POST">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="product_name" value="{{ $edit_product->product_name}}" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình sản phẩm</label>
                            <input type="file" class="form-control" name="product_image" id="exampleInputEmail1" placeholder="Hình sản phẩm">
                            <img src="{{ asset('storage/images/products/'.$edit_product->product_image) }}" alt="" style="width: 70px; height: 70px;">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" class="form-control" value="{{ $edit_product->product_price }}" name="product_price" id="exampleInputEmail1" placeholder="Giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="category_id" >
                                @foreach ($category as $key => $cate )
                                @if ($cate->id==$edit_product->category_id)
                                <option selected value="{{ $cate->id }}" >{{ $cate->category_name }}</option>
                                @else
                                <option value="{{ $cate->id }}" >{{ $cate->category_name }}</option>
                                @endif
                                
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="brand_id">
                                @foreach ($brand as $key => $brad )
                                @if($brad->id==$edit_product->brand_id)
                                <option selected value="{{$brad->id}}" >{{ $brad->brand_name }}</option>
                                @else
                                <option value="{{ $brad->id }}" >{{ $brad->brand_name }}</option>
                                @endif
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none"  rows="8"class="form-control" name="product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{ $edit_product->product_desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea style="resize: none"  rows="8"class="form-control" name="product_content" id="exampleInputPassword1">{{ $edit_product->product_content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiện thị</label>
                            <select class="form-control input-sm m-bot15" name="product_status">
                                
                                @if ($edit_product->product_status==0)
                                <option selected value="{{ $edit_product->product_status }}">Ẩn</option>
                                <option value="1">Hiện thị</option>
                                @else
                                <option selected value="{{ $edit_product->product_status }}">hiện thị</option>
                                <option value="0">Ẩn</option>
                               @endif
                               

                                
                                
                                
                                
                            </select>
                        </div>
                    
                        
                        <button type="submit" name="update_product" class="btn btn-info">Cập nhật danh mục</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
    
</div>
@endsection