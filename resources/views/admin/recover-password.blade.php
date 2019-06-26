@extends('layouts.main-login')
@section('title')
    Recover password
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3"></div>
        <div class="col-lg-6 col-md-6 col-sm-6" style="margin-top: 80px">
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <h4><span><img src="{{asset('images')}}/recover-password.png" class="img-circle" alt="Login" width="60" height="60"></span> Recover password</h4>
                </div>
                <div class="card-body">
                    <form method="post">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Confirm</button>
                    </form>
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
                    <p><a href="{{route('admin.login')}}">Login?</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js')}}/validations/loginscript.js"></script>
@endsection