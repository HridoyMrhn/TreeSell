@extends('frontend.master')


@section('content')


<div class="container">
    <div class="card card-body mt-4">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ asset('uploads/user/'.$profile->image) }}" class="img img-fluid" style="width:220px; height:220px; line-height:220">
            </div>
            <div class="col-md-10">
                <h4 class="user-name">{{ $profile->name }}</h4>
                <p>
                    <i class="fa fa-envelope"></i> <a
                        href="mailto:{{ $profile->email }}">{{ $profile->email }}</a>
                </p>
                <p>
                    <i class="fa fa-phone"></i> {{ $profile->phone_number }}
                </p>
                <p class="user-location">
                    <i class="fa fa-map"></i> {{ $profile->address }}
                </p>
            </div>
        </div>
        <div class="border-top mt-3">
            <div class="uploaded-trees">
                <div class="container">
                    <h2>{{ $profile->name }} Uploaded Trees</h2>
                    @include('frontend.layouts.components.tree')
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
