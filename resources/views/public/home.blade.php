@extends('layouts.user-main')
@section('title')
    Home
@endsection

@section('style')
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">
@endsection

@section('script')
    <script type="text/javascript" src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
@endsection

@section('content')
    <div id="main-banner" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#main-banner" data-slide-to="0" class="active"></li>
            <li data-target="#main-banner" data-slide-to="1"></li>
            <li data-target="#main-banner" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('images')}}/{{$layout->slider1}}">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images')}}/{{$layout->slider2}}">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images')}}/{{$layout->slider3}}">
            </div>
        </div>
        <a class="carousel-control-prev" href="#main-banner" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#main-banner" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <div class="container front-product">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 section-heading">
                <span>STAY CLASSY ESSENTIALS</span>
            </div>
        </div>
        <div class="row">
            <div class="owl-carousel owl-theme">
                @forelse($products as $product)
                    <div class="essential-products">
                        @if($product->discount > 0)
                            <div class="offer">{{$product->discount}}%</div>
                        @endif
                        <a href="{{route('home.details', [$product->code])}}"><img class="rounded-circle" src="{{asset('images')}}/{{$product->image1}}"></a>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a class="buy-option" href="{{route('home.details', [$product->code])}}">BUY</a>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 essential-product-info">
                                <div class="buy-name"><a href="{{route('home.details', [$product->code])}}">{{$product->name}}</a></div>
                                @if($product->discount > 0)
                                    <div class="buy-price">Price <del class="error"><small>{{$product->price}}</small></del> {{$product->discount_price}} TK</div>
                                @else
                                    <div class="buy-price">Price {{$product->price}} TK</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="promotion-left">
                <div id="left-speech" class="break-speech">{{$layout->left_title}}
                    <img class="img-responsive" src="{{asset('images')}}/{{$layout->right_image}}">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="promotion-right">
                <div id="right-speech" class="break-speech">{{$layout->right_title}}<br>
                    <img class="img-responsive" src="{{asset('images')}}/{{$layout->left_image}}">
                </div>
            </div>
        </div>
    </div>
    <div class="container front-product">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 section-heading">
                <span>POPULAR ITEMS</span>
            </div>
        </div>
        <div class="row">
            <div class="owl-carousel owl-theme">
                @forelse($populars as $popular)
                    <div class="essential-products">
                        @if($popular->discount > 0)
                            <div class="offer">{{$popular->discount}}%</div>
                        @endif
                        <a href="{{route('home.details', [$popular->code])}}"><img class="rounded-circle" src="{{asset('images')}}/{{$popular->image1}}"></a>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a class="buy-option" href="{{route('home.details', [$popular->code])}}">BUY</a>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 essential-product-info">
                                <div class="buy-name"><a href="{{route('home.details', [$popular->code])}}">{{$popular->name}}</a></div>
                                @if($popular->discount > 0)
                                    <div class="buy-price">Price <del class="error"><small>{{$popular->price}}</small></del> {{$popular->discount_price}} TK</div>
                                @else
                                    <div class="buy-price">Price {{$popular->price}} TK</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    <div class="container front-product">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 section-heading">
                <span>NEW ARRIVAL</span>
            </div>
        </div>
        <div class="row">
            <div class="owl-carousel owl-theme">
                @forelse($newProducts as $newProduct)
                    <div class="essential-products">
                        @if($newProduct->discount > 0)
                            <div class="offer">{{$newProduct->discount}}%</div>
                        @endif
                        <a href="{{route('home.details', [$newProduct->code])}}"><img class="rounded-circle" src="{{asset('images')}}/{{$newProduct->image1}}"></a>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a class="buy-option" href="{{route('home.details', [$newProduct->code])}}">BUY</a>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 essential-product-info">
                                <div class="buy-name"><a href="{{route('home.details', [$newProduct->code])}}">{{$newProduct->name}}</a></div>
                                @if($newProduct->discount > 0)
                                    <div class="buy-price">Price <del class="error"><small>{{$newProduct->price}}</small></del> {{$newProduct->discount_price}} TK</div>
                                @else
                                    <div class="buy-price">Price {{$newProduct->price}} TK</div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    <div class="container front-product">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 section-heading">
                <span>FOLLOW US</span>
            </div>
        </div>
        <div class="social-links">
            <a href="{{$social->facebook}}"><img src="{{asset('images')}}/social/fb.png"></a>
            <a href="{{$social->instagram}}"><img src="{{asset('images')}}/social/insta.png"></a>
            <a href="{{$social->twitter}}"><img src="{{asset('images')}}/social/twitter.png"></a>
            <a href="{{$social->youtube}}"><img src="{{asset('images')}}/social/youtube.png"></a>
        </div>
    </div>
@endsection