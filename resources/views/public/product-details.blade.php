@extends('layouts.user-main')

@section('title')
    Details
@endsection

@section('script')
    <script src="{{asset('js')}}/script.js"></script>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/productStyle.css">
@endsection

@section('content')
    <div class="container">
        <div class="row details-body">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="detail-body">
                <div id="content">
                    <div class="thumbnail">
                        <img  class="img-thumbnail img-responsive" id="main-image" src="{{asset('images')}}/{{$product->image1}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 product-all-image">
                        <img  class="img-thumbnail img-responsive" id="product-image1" src="{{asset('images')}}/{{$product->image1}}">
                    </div>
                    @if($product->image2)
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 product-all-image">
                        <img  class="img-thumbnail img-responsive" id="product-image2" src="{{asset('images')}}/{{$product->image2}}">
                    </div>
                    @endif
                    @if($product->image3)
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 product-all-image">
                        <img  class="img-thumbnail img-responsive" id="product-image3" src="{{asset('images')}}/{{$product->image3}}">
                    </div>
                    @endif
                </div>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#product-details">Details</a></li>
                </ul>
                <div class="tab-content">
                    <div id="product-details" class="tab-pane active">
                        <table class="table table-hover table-striped table-bordered table-responsive">
                            @forelse($product->specification as $specification)
                            <tr>
                                <td>{{$specification}}</td>
                            </tr>
                            @empty
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="order">
                <h3>{{$product->name}}</h3>
                <h4>Category: {{$product->category_name}}</h4>
                <h4>Type: {{$product->type_name}}</h4>
                @if($product->quantity > 0)
                    <h4>Availability: <span style="color: green">In stock</span></h4>
                @else
                    <h4>Availability: <span class="error">Out of stock</span></h4>
                @endif
                @if($product->discount > 0)
                    <h4>Discount: {{$product->discount}}%</h4>
                    <h4>&lrm;Price:  <del><small class="error">{{$product->price}}</small></del> {{$product->discount_price}} BDT</h4>
                @else
                    <h3>&lrm;Price:  {{$product->price}} BDT</h3>
                @endif
                @if($product->quantity > 0)
                    <a href="{{route('home.checkout', [$product->code])}}"><button type="button" class="btn btn-block btn-success">Buy now</button></a>
                @endif
            </div>
        </div>
    </div>

@endsection