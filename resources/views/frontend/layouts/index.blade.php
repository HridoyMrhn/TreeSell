@extends('frontend.master')

@section('content')


<div class="">
    <div class="mx-auto mt-3 text-center col-6">@include('frontend.layouts.components.status')</div>

    <div class="row">
        <div class="col-sm-8">
            <div class="our-carousel">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($banners as $data)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active':'' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($banners as $data)
                        <div class="carousel-item {{ $loop->index == 0 ? 'active':'' }}">
                            <img src="{{ asset('uploads/banner/'.$data->banner_image) }}" class="d-block w-100" alt="{{ $data->banner_name }}">
                            <div class="carousel-caption d-none d-md-block">
                                <h3>{{ $data->banner_title }}</h3>
                                <p><a href="{{ $data->banner_link }}" class="btn btn-primary slider-link">{{ $data->banner_name }}</a></p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-4 p-0">
            <div class="search-tree">
                <form action="{{ route('tree.search') }}" method="GET">
                    <div class="p-5">
                        <h4>Search Your Tree</h4>
                        <input type="text" name="name" class="form-control" placeholder="Search your tree">
                        <h4>Tree Location</h4>
                        <input type="text" name="location" class="form-control" placeholder="Search your tree location">
                        <p class="mt-3">
                            <button type="submit" class="btn btn-info btn-block btn-search">
                                <i class="fa fa-search"></i> Search Now
                            </button>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Home Page Links -->
{{-- <div class="container">
    <div class="row mt-3 mb-5">
        <div class="col-md-3">
            <div class="homepage-link" onclick="location.href='register.html'">
                <p>
                    <i class="fa fa-sign-in"></i>
                </p>
                <h3>
                    Sign Up
                </h3>
                <p>
                    Sign Up To Upload Your Tree
                </p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="homepage-link" onclick="location.href='upload.html'">
                <p>
                    <i class="fa fa-upload" style="color: #f59a13;"></i>
                </p>
                <h3>
                    Upload Tree
                </h3>
                <p>
                    Upload Your Nearest Tree
                </p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="homepage-link" onclick="location.href='#'">
                <p>
                    <i class="fa fa-search" style="color: #aab7b5;"></i>
                </p>
                <h3>
                    Search Tree
                </h3>
                <p>
                    Search Any Tree
                </p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="homepage-link" onclick="location.href='learn.html'">
                <p>
                    <i class="fa fa-info-circle" style="color: #8BC34A;"></i>
                </p>
                <h3>
                    Learn Tree
                </h3>
                <p>
                    Learn About More Tree
                </p>
            </div>
        </div>
    </div>
</div> --}}
<!-- Home Page Links -->

<div class="uploaded-trees">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h2>Recent Uploaded Trees</h2>
                @include('frontend.layouts.components.tree')
            </div>

            <div class="col-lg-3">
                <h2>Categories</h2>
                @include('frontend.layouts.components.category')
            </div>
        </div>
    </div>
</div>


@endsection
