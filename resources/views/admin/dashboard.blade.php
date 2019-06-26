@extends('layouts.admin-main')

@section('title')
Dashboard
@endsection

@section('content')
    <div class="container">
        <div class="card" id="dasboard-content">
            <div class="card-header">
                <h3>Dashboard</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6">
                        <div class="tile tile-primary">
                            <div class="tile-heading">CURRENT ORDERS</div>
                            <div class="tile-body">
                                <span><img src="{{asset('images')}}/admin/current-order.png" class="img-fluid"></span>
                                <h2 class="pull-right">{{$pending}}</h2>
                            </div>
                            <div class="tile-footer">
                                <a href="{{route('order.pending')}}">View more.....</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6">
                        <div class="tile tile-primary">
                            <div class="tile-heading">TOTAL ORDERS</div>
                            <div class="tile-body">
                                <span><img src="{{asset('images')}}/admin/orders.png" class="img-fluid"></span>
                                <h2 class="pull-right">{{$order}}</h2>
                            </div>
                            <div class="tile-footer">
                                <a href="{{route('order.index')}}">View more.....</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6">
                        <div class="tile tile-primary">
                            <div class="tile-heading">TOTAL DELIVERED</div>
                            <div class="tile-body">
                                <span><img src="{{asset('images')}}/admin/shopcartapply.png" class="img-fluid"></span>
                                <h2 class="pull-right">{{$delivered}}</h2>
                            </div>
                            <div class="tile-footer">
                                <a href="{{route('order.delivered')}}">View more.....</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6">
                        <div class="tile tile-primary">
                            <div class="tile-heading">TOTAL RETURNED</div>
                            <div class="tile-body">
                                <span><img src="{{asset('images')}}/admin/return.png" class="img-fluid"></span>
                                <h2 class="pull-right">{{$returned}}</h2>
                            </div>
                            <div class="tile-footer">
                                <a href="{{route('order.returned')}}">View more.....</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Latest orders</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-responsive table-hover">
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
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td> <img  class="table-image" src="{{asset('images')}}/{{$order->image1}}" alt=""></td>
                            <td>{{$order->product_name}}</td>
                            <td>{{$order->code}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->mobile1}}</td>
                            <td>{{$order->order_date}}</td>
                            <td>{{$order->status_name}}</td>
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