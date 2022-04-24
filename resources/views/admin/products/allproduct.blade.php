@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê thương hiệu sản phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <?php $message=Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }  ?> 
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên sản phẩm</th>
              <th>Giá sản phẩm</th>
              <th>Hình sản phẩm</th>
              <th>Danh mục sản phẩm</th>
              <th>Thương hiệu sản phẩm</th>
              <th>Hiện thị</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data_product as$product)
              
            
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->product_price }}</td>
              <td><img src="{{asset('storage/images/products/'.$product->product_image)}}" style="width: 70px;height: 70px;" alt="{{ $product->product_image }}"></td>
              <td>{{ $product->category_name }}</td>
              <td>{{ $product->brand_name }}</td>
              <td><span class="text-ellipsis">
                @if ($product->product_status==0)
                <a href="{{ URL::to('/active-product/'.$product->product_id)}}"><span><i class="fa fa-thumbs-down fa-thumbs-styling"></i> </span></a>
                @else
                <a href="{{ URL::to('/unactive-product/'.$product->product_id)}}"><span><i class="fa fa-thumbs-up fa-thumbs-styling"></i> </span></a>
                @endif</span></td>
              <td>
                <a href="{{ URL::to('/edit-product/'.$product->product_id) }}" class="active styling-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active"></i></a>
                <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này không')" href="{{ URL::to('/delete-product/'.$product->product_id) }}" class="active styling-delete" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>
              </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
@endsection