@extends('layouts.user-main')

@section('title')
    Order confirmation
@endsection

@section('content')
    <div class="container" id="confirm-order">
        <div class="card">
            <div class="card-header">
                <h2>Order information</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <label>Product code:</label>
                    </div>
                    <div class="col-md-3">
                        <label>{{$product->code}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Product name:</label>
                    </div>
                    <div class="col-md-3">
                        <label>{{$product->name}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Customer name:</label>
                    </div>
                    <div class="col-md-3">
                        <label>{{$order->name}}</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Mobile 1:</label>
                    </div>
                    <div class="col-md-3">
                        <label>{{$order->mobile1}}</label>
                    </div>
                </div>
                @if($order->mobile2)
                    <div class="row">
                        <div class="col-md-3">
                            <label>Mobile 2:</label>
                        </div>
                        <div class="col-md-3">
                            <label>{{$order->mobile2}}</label>
                        </div>
                    </div>
                @endif
                @if($order->address)
                    <div class="row">
                        <div class="col-md-3">
                            <label>Address:</label>
                        </div>
                        <div class="col-md-3">
                            <label>{{$order->address}}</label>
                        </div>
                    </div>
                @endif
                @if($order->email)
                    <div class="row">
                        <div class="col-md-3">
                            <label>Email:</label>
                        </div>
                        <div class="col-md-3">
                            <label>{{$order->email}}</label>
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <h4>Thank you for your order</h4>
            </div>
        </div>
    </div>
@endsection