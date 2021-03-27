@extends('layouts.master')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Create Admin</div>

        <div class="card-body card-block">
            <form action="/admin" method="post" class="" enctype="multipart/form-data">
                @csrf
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
                        <input type="email" id="email" name="email" placeholder="Email" class="form-control">
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
                            <i class="fa fa-asterisk"></i>
                        </div>
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <input name="image" type="file" class="form-control" placeholder="Add Image">
                    </div>
                </div>
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-success btn-sm" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Admins Table</h3>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>email</th>
                            <th>Image</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                        <tr class="tr-shadow">
                            <td>{{$admin['id']}}</td>
                            <td>{{$admin['name']}}</td>
                            <td>
                                <span class="block-email">{{$admin['email']}}</span>
                            </td>
                            <td>
                                <div class="image img-cir img-40">
                                    <img src="images/{{$admin->image}}">
                                </div>
                            </td>
                            <td>
                                <div class="table-data-feature">
                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Send">
                                        <i class="zmdi zmdi-mail-send"></i>
                                    </button>
                                    <a href="{{ route('admin.edit', $admin->id)}}">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i> </button>
                                    </a>
                                </div>
                            <td>
                                <form action="{{ route('admin.destroy', $admin->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="zmdi zmdi-delete"></i> </button>
                                </form>
                            </td>



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
@stop