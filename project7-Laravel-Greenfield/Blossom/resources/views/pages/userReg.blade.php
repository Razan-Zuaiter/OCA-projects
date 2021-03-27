@extends('layouts.shopTemp')
@section('shop_content')
 <!-- Register Area Start Here -->
     <div class="login-register-area mt-no-text">
        <div class="container container-default-2 custom-area">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                    <div class="login-register-wrapper">
                        <div class="section-content text-center mb-5">
                            <h2 class="title-4 mb-2">Create Account</h2>
                            <p class="desc-content">Please Register using account detail bellow.</p>
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
                        
                        <form action="/userReg" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="single-input-item mb-3">
                                <input type="text" name="name" placeholder="Full Name">
                            </div>
                            <div class="single-input-item mb-3">
                                <input type="email" name="email" placeholder="Email">
                            </div>
                            <div class="single-input-item mb-3">
                                <input type="password" name="password" placeholder="Password">
                            </div>
                            <div class="single-input-item mb-3">
                                <input  name="image" type="file" class="form-control" placeholder="Add Image">
                            </div>
                            <div class="single-input-item mb-3">
                                <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    <div class="remember-meta mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="rememberMe">
                                            <p>already have an account?<a href="userLog">Log in</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-input-item mb-3">
                                <button class="btn flosun-button secondary-btn theme-color rounded-0">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection