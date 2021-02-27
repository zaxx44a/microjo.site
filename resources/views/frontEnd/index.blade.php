@extends('frontEnd.layouts.master1')
@section('title','Home Page')

@section('content')
    <section>
        <div class="container">

            @include('frontEnd.layouts.featured')

        </div>
    </section>
@endsection
@section('banner')
    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
        <div class="hero__text">
            <span>Name Tags -- WristBands </span>

            <p>Free Pickup and Delivery Available</p>
            <a href="#" class="primary-btn">SHOP NOW</a>
        </div>
    </div>
@endsection
