@extends('layouts.admin-main')

@section('title')
    Update password
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="{{asset('js')}}/validations/editPasswordscript.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="details-body">
            <div class="card">
                <form id="edit-password" method="POST">
                    {{ csrf_field() }}
                    <div class="card-header">
                        <h3>Edit password</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="old_password" class="col-sm-3 col-form-label">Old password: </label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="old_password" placeholder="Old password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_password" class="col-sm-3 col-form-label">New password: </label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="new-password" name="new_password" placeholder="New password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirm_new_password" class="col-sm-3 col-form-label">Confirm new password: </label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="confirm_new_password" placeholder="Confirm new password">
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