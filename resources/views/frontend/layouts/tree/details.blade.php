@extends('frontend.master')

@section('content')

<div class="container">
    <div class="card card-body mt-3 tree-single">
        <div class="row">
            <div class="col-sm-6 border-right">
                <div class="our-carousel tree-single-carousel">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach ($tree_details->multipleImage as $data)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->index == 0 ? 'active':'' }}"></li>
                            @endforeach
                        </ol>

                        <div class="carousel-inner">
                            @foreach ($tree_details->multipleImage as $data)
                                <div class="carousel-item {{ $loop->index == 0 ? 'active':'' }}">
                                    <img src="{{ asset('uploads/tree/'.$data->tree_image) }}" class="d-block w-100" alt="{{ $tree_details->tree_name }}">
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
            <div class="col-sm-6 pl-4">
                <h2>{{ $tree_details->tree_name }}</h2>
                <p class="uploaded-by">
                    <strong>Uploaded By : </strong>
                    <a href="{{ route('profile', $tree_details->user->user_name) }}">{{ $tree_details->user->name }}</a>
                </p>
                <p class="uploaded-at">
                    <strong>Uploaded at : </strong>{{ $tree_details->created_at->diffForHumans() }}
                </p>
                <p><strong>Category: </strong>
                    <a href="{{ route('category', $tree_details->treeWithCategeoy->slug) }}">{{ $tree_details->treeWithCategeoy->category_name }}</a>
                </p>
                <p><strong>Location: </strong> {{ $tree_details->tree_location }}</p>
                <p> <strong>Width/Height: </strong> {{ $tree_details->tree_width }}ft/{{ $tree_details->tree_height }}ft</p>
                <p><strong>Sceintific Name: </strong> {{ $tree_details->tree_scientific_name }}</p>
            </div>
            <div class="col-sm-12 mt-3">
                <h4>Details: </h4>
                <br>
                {!! $tree_details->tree_info !!}
            </div>
        </div>
    </div>
</div>

@endsection
