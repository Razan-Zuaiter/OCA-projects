@extends('layouts.shopTemp')
@section('shop_content')
<div class="login-register-area mt-no-text">
    <div class="container custom-area">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                <div class="login-register-wrapper">
                    <div class="section-content text-center mb-5">
                        <h3>Login User</h3>
                    </div>
                    @if(Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{Session::get('error')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <form action="userLog" method="post">
                        @csrf
                        <div class="single-input-item mb-3">

                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email">
                        </div>

                        <div class="single-input-item mb-3">

                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>

                        <div class="single-input-item mb-3">
                            <button class="btn flosun-button secondary-btn theme-color rounded-0">Login</button>
                        </div>
                        <div class="single-input-item">
                            <a href="userReg">Creat Account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection