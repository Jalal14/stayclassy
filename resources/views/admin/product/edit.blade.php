@extends('layouts.admin-main')

@section('title')
    Update {{$product->name}}
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="{{asset('js')}}/validations/updateProductscript.js"></script>
@endsection

@section('content')
    <div class="container">
        <div class="details-body col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <form id="update-product" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="card-header">
                        <h3>Update product</h3>
                        <p>Upload (350 * 500) size image for a better view</p>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" placeholder="Product name" value="{{$product->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="code" class="col-sm-3 col-form-label">Code: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="code" value="{{$product->code}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="buy_price" class="col-sm-3 col-form-label">Buying price: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="buy_price" placeholder="Buying price"  value="{{$product->buy_price}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">Price: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="price" placeholder="Selling price"  value="{{$product->price}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="discount" class="col-sm-3 col-form-label">Discount: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="discount" placeholder="Discount  %" value="{{$product->discount}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantity" class="col-sm-3 col-form-label">Quantity: </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="quantity" placeholder="Quantity" value="{{$product->quantity}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_arrival" class="col-sm-3 col-form-label">New arrival: </label>
                            @if($product->new == 1)
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
                            @else
                            <div class="col-sm-9">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="new" value="1">Yes
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="new" value="0"checked>No
                                    </label>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select name="category" class="form-control">
                                    @forelse($categories as $category)
                                        @if($product->category == $category->id)
                                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                        @else
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-sm-3 col-form-label">Type</label>
                            <div class="col-sm-9">
                                <select name="type" class="form-control">
                                    @forelse($types as $type)
                                        @if($product->type == $type->id)
                                            <option value="{{$type->id}}" selected>{{$type->name}}</option>
                                        @else
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforelse
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image1" class="col-sm-3 col-form-label">Image 1: </label>
                            <div class="col-sm-6">
                                <input type="file" id="image-upoad-1" class="form-control" name="image1" accept="image/*">
                            </div>
                            <div class="col-sm-3">
                                <img class="edit-image img-thumbnail img-responsive" id="img-1" src="{{asset('images')}}/{{$product->image1}}" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image2" class="col-sm-3 col-form-label">Image 2: </label>
                            <div class="col-sm-6">
                                <input type="file" id="image-upoad-2" class="form-control" name="image2" accept="image/*">
                            </div>
                            <div class="col-sm-3">
                                @if($product->image2)
                                    <input type="hidden" name="img2" id="img2" value="1">
                                    <img class="edit-image img-thumbnail img-responsive" id="img-2" src="{{asset('images')}}/{{$product->image2}}" alt=""><span><button type="button" id="remove-btn-2" class="remove-button-update btn-danger rounded-circle">&times;</button></span>
                                @else
                                    <input type="hidden" name="img2" id="img2" value="0">
                                    <img class="edit-image img-thumbnail img-responsive" id="img-2" alt=""><span><button type="button" id="remove-btn-2" class="remove-button-update btn-danger rounded-circle">&times;</button></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image3" class="col-sm-3 col-form-label">Image 3: </label>
                            <div class="col-sm-6">
                                <input type="file" id="image-upoad-3" class="form-control" name="image3" accept="image/*">
                            </div>
                            <div class="col-sm-3">
                                @if($product->image3)
                                    <input type="hidden" name="img3" id="img3" value="1">
                                    <img class="edit-image img-thumbnail img-responsive" id="img-3" src="{{asset('images')}}/{{$product->image3}}" alt=""><span><button type="button" id="remove-btn-3" class="remove-button-update btn-danger rounded-circle">&times;</button></span>
                                @else
                                    <input type="hidden" name="img3" id="img3" value="0">
                                    <img class="edit-image img-thumbnail img-responsive" id="img-3" alt=""><span><button type="button" id="remove-btn-3" class="remove-button-update btn-danger rounded-circle">&times;</button></span>
                                @endif
                            </div>
                        </div>
                        <div class="element-wrapper">
                            @forelse($specifications as $specification)
                            <div class="form-group row specification-area">
                                <label for="spcification" class="col-sm-3 col-form-label">Specification: </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control specification-text" name="specification[]" placeholder="Product specification" value="{{$specification}}">
                                </div>
                                <div class="col-sm-2">
                                    <input type="button" class="remove-specification btn btn-danger" value="Remove">
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <input type="button" class="add-specification btn btn-success" value="Add new specification">
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
                        <a href="#"><button type="button" class="btn btn-warning pull-left">Cancel</button></a>
                        <button type="submit" class="btn btn-success pull-right">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection