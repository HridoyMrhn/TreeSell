@extends('backend.master')
@section('contact')
active
@endsection
@section('title')
    All Contact
@endsection

@section('content')
@include('backend.layouts.components.status')


<div class="row">
    <div class="col-lg-12 mx-auto pt-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">All Contact</h4>
            </div>
        </div>
        <table class="table table-bordered stripe data-table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Number</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $key => $data)
                <tr>
                    <td>{{ $key + $contacts->firstItem()  }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->subject }}</td>
                    <td>{{ $data->number }}</td>
                    <td>{{ $data->message }}</td>
                    <td>
                        <a href="{{ route('contact.delete', $data->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
       <div class="mb-4"> {{ $contacts->links() }}</div>
    </div>
</div>

@endsection
