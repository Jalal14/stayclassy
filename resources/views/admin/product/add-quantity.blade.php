@extends('layouts.admin-main')

@section('title')
    Add quantity
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="{{asset('js')}}/validations/updateProductscript.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <div class="card">
                    <form id="add-quantity" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <div class="card-header">
                            <h3>Add quantity</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Name: </label>
                                <div class="col-sm-9">
                                    <label>{{$product->name}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Code: </label>
                                <div class="col-sm-9">
                                    <label>{{$product->code}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Available: </label>
                                <div class="col-sm-9">
                                    <label>{{$product->quantity}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quantity" class="col-sm-3 col-form-label">New quantity: </label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="quantity" placeholder="New quantity">
                                </div>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="card-footer">
                            <a href="{{route('product.index')}}"><button type="button" class="btn btn-warning pull-left">Cancel</button></a>
                            <button type="submit" class="btn btn-success pull-right">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <img class="img-thumbnail img-responsive" src="{{asset('images')}}/{{$product->image1}}">
            </div>
        </div>
    </div>
@endsection