@extends('welcome')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php 
                
                $content=Cart::content();
               

                ?>
                
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình sản phẩm</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá sản phẩm</td>
                        <td class="quantity">Số lượng</td> 
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $v_content )
                        
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ asset('storage/images/products/'.$v_content->options->image) }}" alt="" width="100"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $v_content->name }}</a></h4>
                            <p>ID: {{ $v_content->id }}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{ number_format($v_content->price).' '.'vnđ' }}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href="{{ URL::to('up-qty/'.$v_content->rowId) }}"> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $v_content->qty }}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href="{{ URL::to('tru-qty/'.$v_content->rowId) }}"> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{ number_format($v_content->qty * $v_content->price).' '.'vnđ' }}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{ URL::to('/delete-to-cart/'.$v_content->rowId) }}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach

                    
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng<span>{{ number_format(Cart::subtotal()).' '.'vnđ' }}</span></li>
                        <li>Thuế <span>{{ number_format(Cart::tax()).' '.'vnđ' }}</span></li>
                        <li>Phí vẩn chuyển <span>Free</span></li>
                        <li>Thành tiền <span>{{ number_format(Cart::total()).' '.'vnđ' }}</span></li>
                    </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->

@endsection