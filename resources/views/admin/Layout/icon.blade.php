@extends('layouts.admin-main')

@section('title')
    Icon
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <form method="post" id="promotion" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="card-header">
                    <h3>Icon</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="image1" class="col-sm-3 col-form-label">Icon image: </label>
                        <div class="col-sm-9">
                            <input type="file" id="image-upoad-1" class="form-control" name="image1" accept='image/*'>
                            <img class="uploaded-image img-thumbnail img-responsive" id="img-1"  src="{{asset('images')}}/{{$layout->icon}}">
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