@extends('layouts.admin-main')

@section('title')
    Left image
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="{{asset('js')}}/validations/layoutscript.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <form method="post" id="social">
                {{csrf_field()}}
                <div class="card-header">
                    <h3>Social links</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="facebook" class="col-sm-3 col-form-label">Facebook: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="facebook" placeholder="Facebook link" value="{{$social->facebook}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="twitter" class="col-sm-3 col-form-label">Twitter: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="twitter" placeholder="Twitter link" value="{{$social->twitter}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="instagram" class="col-sm-3 col-form-label">Instagram: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="instagram" placeholder="Instagram link" value="{{$social->instagram}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="youtube" class="col-sm-3 col-form-label">Youtube: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="youtube" placeholder="Youtube link" value="{{$social->youtube}}">
                        </div>
                    </div>
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