@extends('layouts.admin-main')

@section('title')
    Product details
@endsection

@section('style')
<link rel="stylesheet" href="{{asset('css')}}/productStyle.css">
@endsection

@section('content')
    <div class="container">
        <div class="row details-body">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="detail-body">
                <div id="content">
                    <div class="thumbnail">
                        <img  class="img-thumbnail img-responsive" src="{{asset('images')}}/bag-1.jpg">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 product-all-image">
                        <img  class="img-thumbnail img-responsive" src="{{asset('images')}}/bag-1.jpg">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4 product-all-image">
                        <img  class="img-thumbnail img-responsive" src="{{asset('images')}}/bag-1.jpg">
                    </div>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#product-details">Details</a></li>
                </ul>
                <div class="tab-content">
                    <div id="product-details" class="tab-pane active">
                        <table class="table table-hover table-striped table-bordered table-responsive">
                            <tr>
                                <td>Details about product goes here, all details will goes</td>
                            </tr>
                            <tr>
                                <td>Details about product goes here</td>
                            </tr>
                            <tr>
                                <td>Details about product goes here</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id="order">
                <h3>Product name</h3>
                <h4>Category: Product category</h4>
                <h4>Availability: In stock </h4>
                <h3>&lrm;Price: 5000 BDT</h3>
                <a href="#"><button type="button" class="btn btn-block btn-success">Buy now</button></a>
            </div>
        </div>
    </div>
@endsection