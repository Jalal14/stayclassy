@extends('layouts.admin-main')

@section('title')
    All products
@endsection

@section('script')
    <script src="{{asset('js')}}/ajax.js"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h3>All products</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped table-bordered table-responsive m-auto">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Buy price</th>
                                    <th>Price</th>
                                    <th>Discount %</th>
                                    <th>Quantity</th>
                                    <th>Sold</th>
                                    <th>Add quantity</th>
                                    <th>Status</th>
                                <tr>
                            </thead>
                            <tbody id="product-list">
                                @forelse($products as $product)
                                    <tr>
                                        <td> <img  class="table-image" src="{{asset('images')}}/{{$product->image1}}" alt="{{$product->name}}"></td>
                                        <td><a href="{{route('product.edit', [$product->code])}}">{{$product->name}}</a></td>
                                        <td>{{$product->code}}</td>
                                        <td>{{$product->category_name}}</td>
                                        <td>{{$product->type_name}}</td>
                                        <td>{{$product->buy_price}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->discount}}%</td>
                                        <td>{{$product->quantity}}</td>
                                        <td>{{$product->sold}}</td>
                                        <td><a href="{{route('product.newAdd', [$product->code])}}">Add</a> </td>
                                        <td>
                                            @if($product->status == 1)
                                                <span style="color: green">Active</span><hr>
                                                <a href="{{route('product.statusAction', [$product->code])}}">Deactivate now</a>
                                            @elseif($product->status == 2)
                                                <span style="color: red">Deactive</span><hr>
                                                <a href="{{route('product.statusAction', [$product->code])}}">Activate now</a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <h3>No product is in list</h3>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Categories</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="select-all-categories" name="categories[]" checked>Select all
                            </label>
                        </div>
                        @forelse($categories as $category)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input categories-checkbox" type="checkbox" name="categories[]" value={{$category->id}} checked>{{$category->name}}
                            </label>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Types</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" id="select-all-types" name="types[]" checked>Select all
                            </label>
                        </div>
                        @forelse($types as $type)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input types-checkbox" type="checkbox" name="types[]" value={{$type->id}} checked>{{$type->name}}
                            </label>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection