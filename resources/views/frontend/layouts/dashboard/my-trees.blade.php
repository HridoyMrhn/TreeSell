@extends('frontend.master')

@section('myTrees')
active
@endsection

@section('title')
My Uploaded Tree || Dashboard
@endsection
@section('content')


<div class="container">
    <div class="row pb-2">
        <div class="col-lg-3 p-0 mt-4">
            @include('frontend.layouts.components.dashboard-sidebar')
        </div>

        <div class="col-lg-8 p-0">
            <div class="card p-2 card-body mt-4">
                <div class="border-top mt-3">
                    <div class="uploaded-trees">
                        <div class="container">
                            <h2>My Uploaded Trees</h2>
                            @include('frontend.layouts.components.tree')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
