<div class="col-sm-3">
<div class="left-sidebar">
    <h2>Danh mục sản phẩm</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        Sportswear
                    </a>
                </h4>
            </div>
            <div id="sportswear" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul>
                        <li><a href="#">Nike </a></li>
                        <li><a href="#">Under Armour </a></li>
                        <li><a href="#">Adidas </a></li>
                        <li><a href="#">Puma</a></li>
                        <li><a href="#">ASICS </a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                @foreach ($category as $key =>$cate )
                <h4 class="panel-title"><a href="{{ URL::to('/danh-muc-san-pham/'.$cate->id) }}">{{ $cate->category_name }}</a></h4>
                @endforeach
                
            </div>
        </div>	
        
        
    </div><!--/category-products-->

    <div class="brands_products"><!--brands_products-->
        <h2>Thương hiệu sản phẩm</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach ($brand as $key =>$brad)
                <li><a href="{{ URL::to('/thuong-hieu-san-pham/'.$brad->id) }}"> <span class="pull-right">(50)</span>{{ $brad->brand_name }}</a></li>
                @endforeach
                
                
                
                
            </ul>
        </div>
    </div><!--/brands_products-->
    
    {{-- <div class="price-range"><!--price-range-->
        <h2>Price Range</h2>
        <div class="well text-center">
             <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
             <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
        </div>
    </div><!--/price-range-->
     --}}
    {{-- <div class="shipping text-center"><!--shipping-->
        <img src="{{ asset('frontend') }}/images/shipping.jpg" alt="" />
    </div><!--/shipping--> --}}

</div>
</div>