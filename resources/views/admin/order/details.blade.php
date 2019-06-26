@extends('layouts.admin-main')

@section('title')
    Order details
@endsection

@section('content')
    <div class="container">
    <div class="details-body col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <form>
                    <div class="card-header">
                        <h3>Order details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Product Code: </label>
                                    <label class="col-sm-8 col-form-label">{{$order->code}} </label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Product name: </label>
                                    <label class="col-sm-8 col-form-label">{{$order->product_name}}</label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Price: </label>
                                    <label class="col-sm-8 col-form-label">{{$order->selling_price}}</label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Customer name: </label>
                                    <label class="col-sm-8 col-form-label">{{$order->name}} </label>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Mobile no 1: </label>
                                    <label class="col-sm-8 col-form-label">{{$order->mobile1}}</label>
                                </div>
                                @if($order->mobile2)
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Mobile no 2: </label>
                                    <label class="col-sm-8 col-form-label">{{$order->mobile2}}</label>
                                </div>
                                @endif
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Address: </label>
                                    <label class="col-sm-8 col-form-label">{{$order->address}}</label>
                                </div>
                                @if($order->email)
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Email: </label>
                                    <label class="col-sm-8 col-form-label">{{$order->email}}</label>
                                </div>
                                @endif
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Order date: </label>
                                    <label class="col-sm-8 col-form-label">{{$order->order_date}}</label>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <img class="img-responsive img-thumbnail" src="{{asset('images')}}/{{$order->image1}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if($order->status != 6)
                            <a href="{{route('order.cancel', [$order->id])}}" class="mr-auto"><button type="button" class="btn btn-danger">Cancel</button></a>
                        @endif
                        @if($order->status != 5)
                            <a href="{{route('order.return', [$order->id])}}" class="m-auto"><button type="button" class="btn btn-warning">Returned</button></a>
                        @endif
                        @if($order->status != 4)
                            <a href="{{route('order.deliver', [$order->id])}}" class="ml-auto"><button type="button" class="btn btn-success">Delivered</button></a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection