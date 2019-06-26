@extends('layouts.admin-main')

@section('title')
    Order list
@endsection

@section('content')
<div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>All {{$status}}</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product name</th>
                            <th>Product code</th>
                            <th>Customer name</th>
                            <th>Mobile 1</th>
                            <th>Order date</th>
                            <th>Status</th>
                            <th>Details</th>
                        <tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td><a href="{{route('order.show', [$order->id])}}"><img  class="table-image" src="{{asset('images')}}/{{$order->image1}}" alt="{{$order->product_name}}"></a></td>
                                <td><a href="{{route('order.show', [$order->id])}}">{{$order->product_name}}</a></td>
                                <td><a href="{{route('order.show', [$order->id])}}">{{$order->code}}</a></td>
                                <td><a href="{{route('order.show', [$order->id])}}">{{$order->name}}</a></td>
                                <td><a href="{{route('order.show', [$order->id])}}">{{$order->mobile1}}</a></td>
                                <td><a href="{{route('order.show', [$order->id])}}">{{$order->order_date}}</a></td>
                                <td><a href="{{route('order.show', [$order->id])}}">{{$order->status_name}}</a></td>
                                <td><a href="{{route('order.show', [$order->id])}}">Show</a></td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection