@extends('layouts.admin-main')

@section('title')
    Add product
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="{{asset('js')}}/validations/addProductscript.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="details-body">
            <div class="card">
                <form id="add-product" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-header">
                        <h3>Add new product</h3>
                        <p>Upload (350 * 500) size image for a better view</p>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" placeholder="Product name" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-sm-3 col-form-label">Code: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="code" placeholder="Product code" value="{{old('code')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="buy_price" class="col-sm-3 col-form-label">Buying price: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="buy_price" placeholder="Buying price" value="{{old('buy_price')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">Price: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="price" placeholder="Selling price" value="{{old('price')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="discount" class="col-sm-3 col-form-label">Discount: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="discount" placeholder="Discount  %" value="{{old('discount')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantity" class="col-sm-3 col-form-label">Quantity: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="quantity" placeholder="Quantity" value="{{old('quantity')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_arrival" class="col-sm-3 col-form-label">New arrival: </label>
                            <div class="col-sm-9">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="new" value="1" checked>Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="new" value="0">No
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select name="category" class="form-control">
                                    @forelse($categories as $category)
                                        <option value={{$category->id}}>{{$category->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-sm-3 col-form-label">Type: </label>
                            <div class="col-sm-9">
                                <select name="type" class="form-control">
                                    @forelse($types as $type)
                                        <option value={{$type->id}}>{{$type->name}}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image1" class="col-sm-3 col-form-label">Image 1: </label>
                            <div class="col-sm-9">
                                <input type="file" id="image-upoad-1" class="form-control" name="image1" accept='image/*'>
                                <img class="uploaded-image img-thumbnail img-responsive" id="img-1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image2" class="col-sm-3 col-form-label">Image 2: </label>
                            <div class="col-sm-9">
                                <input type="file" id="image-upoad-2" class="form-control" name="image2" accept='image/*'>
                                <img class="uploaded-image img-thumbnail img-responsive" id="img-2"><span><button type="button" id="remove-btn-2" class="remove-button btn-danger rounded-circle">&times;</button></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="imag3" class="col-sm-3 col-form-label">Image 3: </label>
                            <div class="col-sm-9">
                                <input type="file" id="image-upoad-3" class="form-control" name="image3" accept='image/*'>
                                <img class="uploaded-image img-thumbnail img-responsive" id="img-3"><span><button type="button" id="remove-btn-3" class="remove-button btn-danger rounded-circle">&times;</button></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_arrival" class="col-sm-3 col-form-label">Status: </label>
                            <div class="col-sm-9">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" value="1" checked>Active
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="status" value="2">Deactive
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="element-wrapper">
                            <div class="form-group row specification-area">
                                <label for="spcification" class="col-sm-3 col-form-label">Specification: </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control specification-text" name="specification[]" placeholder="Product specification">
                                </div>
                                <div class="col-sm-2">
                                    <input type="button" class="remove-specification btn btn-danger" value="Remove">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <input type="button" class="add-specification btn btn-success" value="Add new field">
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