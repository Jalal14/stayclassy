@extends('layouts.admin-main')

@section('title')
    Slider
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <form method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-header">
                    <h3>Slider images</h3>
                    <small>Select (2048*746) size image for better view</small>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="image1" class="col-sm-3 col-form-label">Slider 1: </label>
                        <div class="col-sm-9">
                            <input type="file" id="image-upoad-1" class="form-control" name="image1" accept='image/*'>
                            <img class="uploaded-image img-thumbnail img-responsive" id="img-1" src="{{asset('images')}}/{{$layout->slider1}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image2" class="col-sm-3 col-form-label">Slider 3: </label>
                        <div class="col-sm-9">
                            <input type="file" id="image-upoad-2" class="form-control" name="image2" accept='image/*'>
                            <img class="uploaded-image img-thumbnail img-responsive" id="img-2" src="{{asset('images')}}/{{$layout->slider2}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="imag3" class="col-sm-3 col-form-label">Slider 3: </label>
                        <div class="col-sm-9">
                            <input type="file" id="image-upoad-3" class="form-control" name="image3" accept='image/*'>
                            <img class="uploaded-image img-thumbnail img-responsive" id="img-3"  src="{{asset('images')}}/{{$layout->slider3}}">
                        </div>
                    </div>
                    <div class="error">
                        @if(session('msg'))
                            * {{session('msg')}}
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" id="confirm" class="btn btn-success pull-right">Upload</button>
                </div>
            </form>
        </div>
    </div>
@endsection