@extends('layouts.admin-main')

@section('title')
    New member
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="{{asset('js')}}/validations/addMemberscript.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="details-body">
            <div class="card">
                <form id="add-member" method="POST">
                    {{ csrf_field() }}
                    <div class="card-header">
                        <h3>New member</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" placeholder="Member name" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Username: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="username" placeholder="Username" value="{{old('username')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label">Phone: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone" placeholder="Phone number" value="{{old('phone')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Password: </label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirm_password" class="col-sm-3 col-form-label">Confrim password: </label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm password">
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
                        <button type="reset" class="btn btn-danger pull-left">Reset</button>
                        <button type="submit" id="confirm" class="btn btn-success pull-right">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection