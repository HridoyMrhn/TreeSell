@extends('frontend.master')


@section('content')


<div class="container">
    <div class="card card-body mt-4">
        <div class="row pb-4">
            <div class="col-lg-3">
                <img src="{{ asset('uploads/user/'.$user->image) }}" class="img img-fluid" style="width:220px; height:220px; line-height:220">
            </div>
            <div class="col-lg-7">
                <h3 class="user-name">{{ $user->name }}</h3>
                <p>
                    <i class="fa fa-envelope"></i> <a
                        href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                </p>
                <p>
                    <i class="fa fa-phone"></i> {{ $user->phone_number }}
                </p>
                <p class="user-location">
                    <i class="fa fa-map"></i> {{ $user->address }}
                </p>
                <h4 class="user-location">About me </h4>
                <hr>
                <p class="border p-3">{{ $user->about }}</p>

            </div>
            <div class="col-lg-2">
                <div class="float-right">
                    <a href="#profileEditModal" data-toggle="modal" class="btn btn-success d-inline-block"><i class="fa fa-edit"></i> Edit Profile</a>
                </div>
            </div>
        </div>

        @include('frontend.layouts.components.status')

        <div class="border-top mt-3">
            <div class="uploaded-trees">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <h2>{{ $user->name }} Uploaded Trees</h2>
                            @include('frontend.layouts.components.tree')
                        </div>
                        <div class="col-lg-3">
                            <h2>Categories</h2>
                            @include('frontend.layouts.components.category')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Profile Edit Modal -->
<div class="modal fade" id="profileEditModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Your Profile
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form method="POST" action="{{ route('user.dashboard.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="name">Name: </label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="user_name">Username</label>
                                <input type="text" name="user_name" id="user_name" class="form-control" @error('user_name') is-invalid @enderror value="{{ $user->user_name }}">
                                @error('user_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Email:</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-lg-6">
                            <label for="password">Password:</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" autofocus>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" class="form-control" @error('phone_number') is-invalid @enderror value="{{ $user->phone_number }}">
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="image">image</label>
                                <input type="file" name="image" id="image" class="form-control pb-5">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="about">About You</label>
                                <textarea name="about" id="about" rows="5" class="form-control">{{$user->about }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
