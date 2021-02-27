@extends('frontEnd.layouts.master1')
@section('title','Detial Page')

@section('Breadcrumb')
    <!-- Breadcrumb Section Begin -->

    <section class="breadcrumb-section set-bg" data-setbg="{{ url('img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">

                        <h2>Product Cart</h2>

                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Vegetables</a>
                            <span>Vegetable’s Package</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
@endsection

@section('content')

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('message')}}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                        <tr>
                            <th class="shoping__product">Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart_datas as $cart_data)
                            <?php
                            $image_products=DB::table('products')->select('image')->where('id',$cart_data->products_id)->get();
                            ?>
                        <tr>
                            <td class="shoping__cart__item">
                                @foreach($image_products as $image_product)
                                <img src="{{url('products/small',$image_product->image)}}" alt="">
                                <h5>{{$cart_data->product_name}}</h5>
                                    <p>{{$cart_data->product_code}} | {{$cart_data->size}}</p>
                                @endforeach
                            </td>
                            <td class="shoping__cart__price">
                                {{$cart_data->price}} JD
                            </td>
                            <td class="shoping__cart__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cart_data->id.'/1')}}"> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart_data->quantity}}" autocomplete="off" size="2">
                                        @if($cart_data->quantity>1)
                                            <a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart_data->id.'/-1')}}"> - </a>
                                        @endif
                                    </div>
                                </div>


                            </td>
                            <td class="shoping__cart__total">
                                <p class="cart_total_price">$ {{$cart_data->price*$cart_data->quantity}}</p>
                            </td>
                            <td class="shoping__cart__item__close">
                                <a class="cart_quantity_delete" href="{{url('/cart/deleteItem',$cart_data->id)}}"><i class="fa fa-times"></i></a>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                @if(Session::has('message_coupon'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{Session::get('message_coupon')}}
                    </div>
                @endif
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>


                        <form action="{{url('/apply-coupon')}}" method="post" role="form">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="Total_amountPrice" value="{{$total_price}}">
                            <div class="controls {{$errors->has('coupon_code')?'has-error':''}}">
                                <input type="text" class="form-control" name="coupon_code" id="coupon_code" placeholder="Promotion By Coupon">
                                <span class="text-danger">{{$errors->first('coupon_code')}}</span>
                            </div>
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                @if(Session::has('message_apply_sucess'))
                    <div class="alert alert-success text-center" role="alert">
                        {{Session::get('message_apply_sucess')}}
                    </div>
                @endif

                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>

                        @if(Session::has('discount_amount_price'))
                            <li>Sub Total <span>$ {{$total_price}}</span></li>
                            <li>Coupon Discount (Code : {{Session::get('coupon_code')}}) <span>$ {{Session::get('discount_amount_price')}}</span></li>
                            <li>Total <span>$ {{$total_price-Session::get('discount_amount_price')}}</span></li>
                        @else
                            <li>Total <span>$ {{$total_price}}</span></li>
                        @endif

                    </ul>
                    <a href="{{url('/check-out')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->

@endsection
