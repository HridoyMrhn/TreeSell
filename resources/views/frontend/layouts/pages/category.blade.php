@extends('frontend.master')

@section('content')

<div class="uploaded-trees">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h2>{{ $category->category_name }} Trees</h2>
                @include('frontend.layouts.components.tree')
            </div>

            <div class="col-lg-3">
                <h2>Categories</h2>
                @foreach (categories() as $data)
                    <a class="dropdown-item {{ $data->id == $category->id ? 'active':'' }}" href="{{ route('category', $data->slug) }}">{{ $data->category_name }}</a>
                @endforeach

            </div>
        </div>
    </div>
</div>


@endsection
