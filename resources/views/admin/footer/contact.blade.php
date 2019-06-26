@extends('layouts.admin-main')

@section('title')
    Contact
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <form method="post" id="social">
                {{csrf_field()}}
                <div class="card-header">
                    <h3>Contact information</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="heading" class="col-md-3 col-form-label">Heading: </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="heading" placeholder="Heading" value="{{$contact->heading}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-3 col-form-label">Contact number: </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="number" placeholder="Contact number" value="{{$contact->number}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-3 col-form-label">Email: </label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{$contact->email}}">
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