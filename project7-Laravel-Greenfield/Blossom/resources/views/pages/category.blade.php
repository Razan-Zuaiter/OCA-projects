@extends('layouts.master')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Manage Categories</div>
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <span>{{$error}}</span>
            <br>
            @endforeach
        </div>
        @endif
        <div class="card-body card-block">
            <form action="manageCategory" method="post" class="" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input type="text" id="category_name" name="category_name" placeholder="Category Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <input type="text" id="category_desc" name="category_desc" placeholder="Description" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-asterisk"></i>
                        </div>
                        <input name="category_image" type="file" class="form-control" placeholder="Add Image">
                    </div>

                </div>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit" style="background-color: #E72463;">Create
                    </button>
                </div>

            </form>
        </div>
    </div>
    <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Categories Table</h3>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category name</th>
                            <th>Category Description</th>
                            <th>Category Image</th>
                            <th>Edit | Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr class="tr-shadow">
                            <td>{{$category['cat_id']}}</td>
                            <td>{{$category['category_name']}}</td>
                            <td>
                                {{$category['category_desc']}}
                            </td>
                            <td>
                                <div class="image img-cir img-40">
                                    <img src="images/{{$category->category_image}}">
                                </div>
                            </td>
                            <td style="display: flex; justify-content:space-around">
                                <div class="table-data-feature">

                                    <a href="{{ route('manageCategory.edit', $category->cat_id)}}">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i> </button>
                                    </a>
                                </div>

                                <div style="margin-left: 10px;" class="table-data-feature">

                                    <form action="{{ route('manageCategory.destroy', $category->cat_id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i> </button>
                                    </form>
                                </div>




                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
</div>
@stop