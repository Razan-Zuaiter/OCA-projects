@extends('layouts.master')
@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Manage Product</div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <span>{{$error}}</span>
                        <br>
                        @endforeach
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Edit Product</h3>
                        </div>
                        <hr>

                        <form action="{{ route('manageProduct.update', $product->pro_id) }}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            @method('PATCH')

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input value='{{$product->product_name}}' type="text" id="username" name="product_name" placeholder="Product Name" class="form-control">
                                </div>
                                @if ($errors->has('product_name'))
                                <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-align-justify" aria-hidden="true"></i>
                                    </div>
                                    <select type="text" name="cat_id" placeholder="Category" class="form-control">
                                        @foreach($categories as $category)
                                        <option value="{{$category->cat_id}}"> {{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input value='{{$product->product_desc}}' type="text" id="product_desc" name="product_desc" placeholder="Product Description" class="form-control">
                                </div>
                                @if ($errors->has('product_desc'))
                                <span class="text-danger">{{ $errors->first('product_desc') }}</span>
                                @endif
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-usd" style="padding:0 4px;"></i>
                                    </div>
                                    <input type="text" value='{{$product->product_price}}' id="product_price" name="product_price" placeholder="Product Price" class="form-control">
                                </div>
                                @if ($errors->has('product_price'))
                                <span class="text-danger">{{ $errors->first('product_price') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-balance-scale"></i>
                                    </div>
                                    <input type="text" value='{{$product->product_quantity}}' id="product_quantity" name="product_quantity" placeholder="Product Quantity" class="form-control">
                                </div>
                                @if ($errors->has('product_quantity'))
                                <span class="text-danger">{{ $errors->first('product_quantity') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-upload" style="padding:0 2px;"></i>
                                    </div>
                                    <input type="file" id="product_image" name="product_image" placeholder="Product image" class="form-control">
                                </div>

                            </div>

                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection