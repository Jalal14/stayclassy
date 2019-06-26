@extends('layouts.admin-main')

@section('title')
    Stuff-list
@endsection

@section('script')
    <script src="{{asset('js')}}/ajax.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Stuff list</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped table-bordered table-responsive m-auto">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Email</th>
                            <tr>
                            </thead>
                            <tbody id="product-list">
                            @forelse($stuffs as $stuff)
                                <tr>
                                    <td>{{$stuff->name}}</td>
                                    <td>{{$stuff->username}}</td>
                                    <td>{{$stuff->phone}}</td>
                                    <td>{{$stuff->email}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <h3>No stuff is in list</h3>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection