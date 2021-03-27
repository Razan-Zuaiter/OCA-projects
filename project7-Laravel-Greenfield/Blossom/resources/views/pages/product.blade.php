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
                            <h3 class="text-center title-2">Create Product</h3>
                        </div>
                        <hr>
                        <form action="manageProduct" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @csrf

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="username" name="product_name" placeholder="Product Name" class="form-control">
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
                                    <input type="text" id="product_desc" name="product_desc" placeholder="Product Description" class="form-control">
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
                                    <input type="text" id="product_price" name="product_price" placeholder="Product Price" class="form-control">
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
                                    <input type="text" id="product_quantity" name="product_quantity" placeholder="Product Quantity" class="form-control">
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
                                <button type="submit" class="btn btn-lg btn-info btn-block" name="submit">Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Products Table</h3>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>Category name</th>
                            <th>Product name</th>
                            <th>Product Description</th>
                            <th>Product Price</th>
                            <th>Product Image</th>
                            <th>Edit | Delete</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach($products as $items => $value)

                        <tr class="tr-shadow">
                            <td>{{$value->category_name}}</td>
                            <td>{{$value->product_name}}</td>
                            <td>{{$value->product_desc}}</td>
                            <td>
                                {{$value->product_price}}
                            </td>

                            <td>
                                <div class="image img-cir img-40">
                                    <img src="images/{{$value->product_image}}">
                                </div>
                            </td>
                            <td style="display: flex; justify-content:space-around">
                                <div class="table-data-feature">

                                    <a href="{{ route('manageProduct.edit', $value->cat_id)}}">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i> </button>
                                    </a>
                                </div>

                                <div style="margin-left: 10px;" class="table-data-feature">
                                    <form action="{{ route('manageProduct.destroy', $value->cat_id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i> </button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                        <tr class="spacer"></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
</div>
@endsection