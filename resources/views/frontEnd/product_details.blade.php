@extends('frontEnd.layouts.master1')
@section('title','Detial Page')

@section('Breadcrumb')
    <!-- Breadcrumb Section Begin -->

    <section class="breadcrumb-section set-bg" data-setbg="{{ url('img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">

                        <h2>Product Details</h2>

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
        <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">

                    @if(Session::has('message'))
                        <div class="alert alert-success text-center" role="alert">
                            {{Session::get('message')}}
                        </div>
                    @endif

                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <a href="{{url('products/large',$detail_product->image)}}">
                            <img class="product__details__pic__item--large"
                                 src="{{url('products/small',$detail_product->image)}}" alt="">
                            </a>
                        </div>
                        <div class="product__details__pic__slider owl-carousel">

                            @foreach($imagesGalleries as $imagesGallery)

                                <img data-imgbigurl="{{url('products/large',$imagesGallery->image)}}"
                                     src="{{url('products/small',$imagesGallery->image)}}" alt="">
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">

                    <form action="{{route('addToCart')}}" method="post" role="form">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="products_id" value="{{$detail_product->id}}">
                        <input type="hidden" name="product_name" value="{{$detail_product->p_name}}">
                        <input type="hidden" name="product_code" value="{{$detail_product->p_code}}">
                        <input type="hidden" name="product_color" value="{{$detail_product->p_color}}">
                        <input type="hidden" name="price" value="{{$detail_product->price}}" id="dynamicPriceInput">
                        <div class="product-information"><!--/product-information-->


                       <div class="product__details__text">
                        <h3>{{$detail_product->p_name}}</h3>
                        <p>Code ID: {{$detail_product->p_code}}</p>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">US ${{$detail_product->price}}</div>
                        <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam
                            vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet
                            quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p>
                        <div class="product__details__quantity">

                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" name="quantity" value="{{$totalStock}}" id="inputStock"/>
                                </div>
                            </div>

                            <div class="quantity">

                               <select name="size" id="idSize" class="form-select" aria-label="Default select example">
                        	    <option  selected value="">Select Size</option>
                                    @foreach($detail_product->attributes as $attrs)
                                       <option value="{{$detail_product->id}}-{{$attrs->size}}">{{$attrs->size}}</option>
                                   @endforeach
                               </select>

                            </div>


                        </div>
                           @if($totalStock>0)
                               <button type="submit" class="btn btn-fefault cart" id="buttonAddToCart">
                                   <i class="fa fa-shopping-cart"></i>
                                   Add to cart
                               </button>
                           @endif

                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li>
                                <b>Availability</b>
                                @if($totalStock>0)
                                    <span id="availableStock">In Stock</span>
                                @else
                                    <span id="availableStock">Out of Stock</span>
                                @endif
                            </li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                    </form>
                </div>

                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                   aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                   aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                   aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>{{$detail_product->description}} .</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $countChunk=0;?>
                @foreach($relateProducts->chunk(3) as $chunk)
                    <?php $countChunk++; ?>

                        @foreach($chunk as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 item<?php if($countChunk==1){ echo' active';} ?>">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{url('/products/small',$item->image)}}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{$item->p_name}}</a></h6>
                            <h5>{{$item->price}} JD</h5>
                        </div>
                    </div>
                </div>
                        @endforeach

                    @endforeach

            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
@endsection
