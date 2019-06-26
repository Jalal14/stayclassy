@extends('layouts.admin-main')

@section('title')
    Profile
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="{{asset('js')}}/validations/addMemberscript.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="details-body">
            <div class="card">
                <form id="edit-profile" method="POST">
                    {{ csrf_field() }}
                    <div class="card-header">
                        <h3>Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" placeholder="Member name" value="{{$stuff->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Username: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="username" placeholder="Username" value="{{$stuff->username}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label">Phone: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone" placeholder="Phone number" value="{{$stuff->phone}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{$stuff->email}}">
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
                        <div class="error">
                            @if(session('msg'))
                                * {{session('msg')}}
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="confirm" class="btn btn-success pull-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection