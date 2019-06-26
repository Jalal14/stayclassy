@extends('layouts.user-main')

@section('title')
    Stayclassy policy
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/productStyle.css">
@endsection

@section('content')
    <div class="container">
        <div class="card details-body">
            <div class="card-header">
                <div class="text-uppercase"><h2>{{$data->heading}}</h2></div>
            </div>
            <div class="card-body">
                <div class="row">
                    <h4>{{$data->title}}</h4>
                </div>
                <div class="row">
                    <pre>{{$data->description}}</pre>
                </div>
            </div>
        </div>
    </div>
@endsection