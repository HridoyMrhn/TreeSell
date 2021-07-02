@extends('frontend.main')
@section('content')

<div>
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="{{ asset('/uploads/utility/logo.png') }}" alt="">
                </a>
            </div>
        </div>
    </div>

    @if (session()->has('admin_logout'))
        <div class="alert alert-success alert-dismissible fade show col-6 m-auto mt-3 mb-4 text-center" role="alert">
            <strong class="text-dark">{{ session()->get('admin_logout') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show col-6 m-auto mt-3 mb-4 text-center" role="alert">
            @foreach ($errors->all() as $error)
                <strong class="text-dark">{{$error}}</strong><br>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    @endif --}}

    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('/frontend/assets/img/auth/login-page-img.png') }}" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">

                            {{-- @dd(auth()->user()) --}}
                            <h2 class="text-center text-primary">Admin Login</h2>
                        </div>
                        <form action="{{route('admin.doLogin')}}" method="POST">
                            @csrf
                            <div class="input-group custom">
                                <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Enter email Address">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Enter Password Here">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            {{-- <div class="row pb-30">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="forgot-password">
                                        <a href="forgot-password.html">Forgot Password</a>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
                                    </div>
                                    {{-- <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a>
                                    </div> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
