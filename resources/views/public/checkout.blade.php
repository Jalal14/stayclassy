@extends('layouts.user-main')

@section('title')
    checkout
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/productStyle.css">
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="{{asset('js')}}/validations/checkoutscript.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="details-body col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="card">
                <form id="checkout" method="post">
                    {{csrf_field()}}
                    <div class="card-header">
                        <h3>Delivery details</h3>
                    </div>
                    <div class="card-body">
                    
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile1" class="col-sm-3 col-form-label">Mobile no (1): </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="mobile1" placeholder="Mobile no 1" value="{{old('mobile1')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile1" class="col-sm-3 col-form-label">Mobile no (2): </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="mobile2" placeholder="Mobile no 2"  value="{{old('mobile2')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-3 col-form-label">Address: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="address" placeholder="Delivery address" value="{{old('address')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" placeholder="email"  value="{{old('email')}}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <button type="submit" class="btn btn-success pull-right">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection