@extends('backend.master')

@section('content')

@include('backend.layouts.components.status')

<div class="card-box pd-20 height-100-p mb-30">
    <div class="row align-items-center">
        <div class="col-md-4">
            <img src="/uploads/department/20210416050427.jpg" alt="">
            {{-- <img src="{{ url('/uploads/student/'.$student->student_image) }}" alt=""> --}}
        </div>
        <div class="col-md-8">
            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                Welcome back
                <div class="weight-600 font-30 text-blue">
                    {{-- {{ Auth::user()->name }} --}}
                    {{-- @isset(Auth::user()->name)
                        {{ Auth::user()->name }}
                    @endisset --}}
                    Md Hridoy
                </div>
            </h4>
            <p class="font-18 max-width-600">Lorem ipsum dolor sit amet, consectetur adipisicing
                elit. Unde hic non repellendus debitis iure, doloremque assumenda. Autem modi,
                corrupti, nobis ea iure fugiat, veniam non quaerat mollitia animi error corporis.
            </p>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id="chart"></div>
                </div>
                <div class="widget-data">
                    <div class="h4 mb-0">2020</div>
                    <div class="weight-600 font-14">Contact</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id="chart2"></div>
                </div>
                <div class="widget-data">
                    <div class="h4 mb-0">400</div>
                    <div class="weight-600 font-14">Deals</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id="chart3"></div>
                </div>
                <div class="widget-data">
                    <div class="h4 mb-0">350</div>
                    <div class="weight-600 font-14">Campaign</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="progress-data">
                    <div id="chart4"></div>
                </div>
                <div class="widget-data">
                    <div class="h4 mb-0">$6060</div>
                    <div class="weight-600 font-14">Worth</div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="pd-20 card-box mb-30">
    <div class="clearfix mb-20">
        <div class="pull-left">
            <h4 class="text-blue h4">Total Member</h4>
        </div>
        <div class="pull-right">
            <a href="#border-table" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                data-toggle="collapse" role="button"><i class="fa fa-code"></i> Source Code</a>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Seriel</th>
                <th scope="col">DB id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Createad</th>
                <th scope="col">Updated</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><span class="badge badge-primary">Primary</span></td>
            </tr>
        </tbody>
    </table>
</div>

        {{-- <div class="row">
    <div class="col-xl-8 mb-30">
        <div class="card-box height-100-p pd-20">
            <h2 class="h4 mb-20">Activity</h2>
            <div id="chart5"></div>
        </div>
    </div>
    <div class="col-xl-4 mb-30">
        <div class="card-box height-100-p pd-20">
            <h2 class="h4 mb-20">Lead Target</h2>
            <div id="chart6"></div>
        </div>
    </div>
</div> --}}


@endsection
