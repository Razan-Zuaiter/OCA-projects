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
            <form action="{{ route('admin.update', $admin->id) }}" method="post" class="" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </div>
                        <input type="text" id="username" name="admin_name" placeholder="Admin Name" value="{{$admin->admin_name}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <input type="email" id="email" name="admin_email" placeholder="Email" value="{{$admin->admin_email}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-asterisk"></i>
                        </div>
                        <input type="password" id="password" name="admin_password" placeholder="Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <input name="admin_image" type="file" class="form-control" placeholder="Add Image">
                    </div>
                </div>
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-success btn-sm" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>
@stop