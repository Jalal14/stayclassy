@extends('layouts.main-login')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3"></div>
        <div class="col-lg-6 col-md-6 col-sm-6" style="margin-top: 80px">
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <h4><span><img src="{{asset('images')}}/login.png" class="img-circle" alt="Login" width="60" height="60"></span> Login</h4>
                </div>
                <div class="card-body">
                    <form method="post" id="login">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Login</button>
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
                    <p><a href="{{route('admin.forgotPassword')}}">Forgot Password?</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js')}}/validations/loginscript.js"></script>
@endsection