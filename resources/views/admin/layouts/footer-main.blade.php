@extends('layouts.admin-main')

@section('script')
    <script type="text/javascript" src="{{asset('js')}}/validations/footerscript.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <form method="post" id="footer-form">
                {{csrf_field()}}
                <div class="card-header">
                    <h3>@yield('footer-heading')</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="heading" class="col-md-3 col-form-label">Heading: </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="heading" value="{{$data->heading}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-3 col-form-label">Title: </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="title" value="{{$data->title}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-3 col-form-label">Description: </label>
                        <div class="col-md-9">
                            <textarea name="description" class="col-md-12" rows="6">{{$data->description}}</textarea>
                        </div>
                    </div>
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p class="error">* {{$error}}</p>
                        @endforeach
                    @endif
                    <div class="error">
                        @if(session('msg'))
                            * {{session('msg')}}
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" id="confirm" class="btn btn-success pull-right">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection