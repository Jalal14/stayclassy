@extends('layouts.admin-main')

@section('title')
    Right image
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/validations/layoutscript.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <form id="promotion" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-header">
                    <h3>Right image</h3>
                    <small>Select (640*400) size image for better view</small>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="image1" class="col-sm-3 col-form-label">Title: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image1" class="col-sm-3 col-form-label">Right image: </label>
                        <div class="col-sm-9">
                            <input type="file" id="image-upoad-1" class="form-control" name="image1" accept='image/*'>
                            <img class="uploaded-image img-thumbnail img-responsive" id="img-1"  src="{{asset('images')}}/{{$layout->right_image}}">
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