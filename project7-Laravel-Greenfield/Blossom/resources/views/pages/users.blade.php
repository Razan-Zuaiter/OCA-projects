@extends('layouts.master')

@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <span>{{$error}}</span>
                <br>
                @endforeach
            </div>
            @endif
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Manage User</div>
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Create User</h3>
                        </div>
                        <hr>
                        <form action="user" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="username" name="name" placeholder="Username" class="form-control">
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
                                    <input type="email" id="username" name="email" placeholder="User Email" class="form-control">
                                </div>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-pencil-square" aria-hidden="true"></i>
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
                                    <input type="password" id="password" name="password" placeholder="User password" class="form-control">
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
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">Add
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Users Table</h3>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2 ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>


                        @foreach($user as $items => $value)

                        <tr class="tr-shadow">

                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->role}}</td>
                            <td>
                                <div class="image img-cir img-40">
                                    <img src="images/{{$value->image}}">
                                </div>
                            </td>
                            <td>
                                <div class="table-data-feature">

                                    <a href="{{ route('user.edit', $value->id)}}">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i> </button>
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div class="table-data-feature">
                                    <form action=" {{ route('user.destroy', $value->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class=" zmdi zmdi-delete"></i> </button>
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
@endsection