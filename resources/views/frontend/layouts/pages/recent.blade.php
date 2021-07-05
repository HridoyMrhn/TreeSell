@extends('frontend.master')

@section('content')

<div class="uploaded-trees">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                @if (Route::is('most.search'))
                    <h2>Most Searched Trees</h2>
                @elseif (isset($search) or isset($location))
                    <h2>
                        Searched Tree -
                        {!! $search != '' ?  "Name: <strong>$search</strong> ":'' !!}
                        {!! $location != '' ?  "Location: <strong>$location</strong> ":'' !!}
                    </h2>
                @else
                    <h2>Recent Uploaded Trees</h2>
                @endif
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
