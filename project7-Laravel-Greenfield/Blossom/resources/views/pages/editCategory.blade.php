@extends('layouts.master')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Create Admin</div>
        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <span>{{$error}}</span>
            <br>
            @endforeach
        </div>
        @endif
        <div class="card-body card-block">
            <form action="{{ route('manageCategory.update', $category->cat_id) }}" method="post" class="" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input type="text" id="category_name" value="{{$category->category_name}}" name="category_name" placeholder="Category Name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <input type="text" id="category_desc" value="{{$category->category_desc}}" name="category_desc" placeholder="Description" class="form-control">
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
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">Update
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@stop