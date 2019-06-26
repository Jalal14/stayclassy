@extends('layouts.user-main')

@section('title')
    {{$title}} list
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/productStyle.css">
@endsection

@section('content')
    <div class="container">
        <div class="card details-body">
            <div class="card-header">
                <h2>{{$title}}</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    @forelse($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 essential-products">
                        <a href="{{route('home.details', [$product->code])}}">
                            <div class="row">
                                <img class="rounded-circle" src="{{asset('images')}}/{{$product->image1}}">
                                @if($product->discount > 0)
                                    <div class="offer">{{$product->discount}}%</div>
                                @endif
                            </div>
                        </a>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <a class="buy-option" href="{{route('home.details', [$product->code])}}">BUY</a>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-10 col-xs-10 essential-product-info">
                                <div class="buy-name"><a href="{{route('home.details', [$product->code])}}">{{$product->name}}</a></div>
                                <div class="buy-price">Price
                                    @if($product->discount > 0)
                                        <del><small class="error">{{$product->price}} </small></del>{{$product->price}}
                                    @else
                                        {{$product->price}}
                                    @endif
                                    TK</div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <h3>Products not found in this category</h3>
                    @endforelse
                </div>
            </div>
            <div class="card-footer">
                <div class="container">
                    <div class="pagination justify-content-center" id="pagination">
                    {{ $products->links() }}
                    {{--<ul class="pagination" id="first-last">--}}
                        {{--<li><a href="{{route('home.list', [$category])}}?page={{$products->lastpage()}}">Last</a></li>--}}
                    {{--</ul>--}}
                    {{--home.list--}}
                    {{--<li class="page-item"><a class="page-link" href="#">Previous</a></li>--}}
                    {{--<li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                    {{--<li class="page-item active"><a class="page-link" href="#">2</a></li>--}}
                    {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                    {{--<li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                    {{--<li class="page-item"><a class="page-link" href="#">Next</a></li>--}}
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection