@extends('frontend.main')
@section('content')

<div class="container">
    <div class="row m-5">
        <div class="col-lg-6 pd-20 card-box m-5 m-auto">
            <div class="clearfix">
                <div class="pull-left">
                    <h2 class="text-blue h4">Registration Form</h2>
                    <hr>
                </div>
            </div>
            <form action="{{route('registration.create')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name">
                    @error('name')
                        <b class="text-danger">{{ $message }}</b>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email Address">
                    @error('email')
                        <b class="text-danger">{{ $message }}</b>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password Here">
                    @error('password')
                        <b class="text-danger">{{ $message }}</b>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Enter Confirm Password">
                </div> --}}

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="login.html">
                <img src="vendors/images/deskapp-logo.svg" alt="">
            </a>
        </div>
        <div class="login-menu">
            <ul>
                <li><a href="{{ route('login.form') }}">Login</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
                <img src="vendors/images/login-page-img.png" alt="">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Register Now</h2>
                    </div>
                    <form action="{{route('registration.create')}}" method="POST">
                        @csrf
                        <div class="input-group custom">
                            <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Enter Your Name">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="email" name="email" class="form-control form-control-lg" id="email" placeholder="Enter email Address">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" name="password" id="password_confirmation" class="form-control form-control-lg"  placeholder="Enter Password Here">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
