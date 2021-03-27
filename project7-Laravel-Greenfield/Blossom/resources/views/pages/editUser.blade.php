@extends('layouts.master')
@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Manage Users</div>
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
                            <h3 class="text-center title-2">Update User</h3>
                        </div>
                        <hr>

                        <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            @method('PATCH')

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="username" name="name" value='{{$user->name}}' placeholder="Username" class="form-control">
                                </div>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input value='{{$user->email}}' type="email" id="username" name="email" placeholder="User Email" class="form-control">
                                </div>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <select type="text" name="type" placeholder="User Type" class="form-control">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa fa-key"></i>
                                    </div>
                                    <input value='{{$user->password}}' type="password" id="password" name="password" placeholder="User password" class="form-control">
                                </div>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-upload"></i>
                                    </div>
                                    <input type="file" id="image" name="image" placeholder="User image" class="form-control">
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