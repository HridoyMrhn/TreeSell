@extends('backend.master')
@section('banner')
active
@endsection

@section('title')
    All Banner
@endsection

@section('content')
@include('backend.layouts.components.status')


<div class="row">
    <div class="col-lg-12 mx-auto pt-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Profile</h4>
            </div>
            <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Add Banner</button>
            </div>
        </div>
        <table class="table table-bordered data-table stripe">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Name</th>
                    <th scope="col">Link</th>
                    <th scope="col">image</th>
                    <th scope="col">info</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banner as $data)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $data->banner_title }}</td>
                    <td>{{ $data->banner_name }}</td>
                    <td>{{ $data->banner_link }}</td>
                    <td>
                        {{-- <img class="rounded-circle" width="80" height="80"
                            src="{{ url('uploads/student/'.$data->student_image) }}" alt=""> --}}
                        <img width="100" height="100"
                            src="{{ url('uploads/banner/'.$data->banner_image) }}" alt="{{ $data->banner_name }}">
                    </td>
                    <td>{{ $data->banner_info }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="#editModal{{ $data->id }}" data-toggle="modal"
                                class="btn btn-dark"><i class="fa fa-edit"></i></a>
                            <a href="#deleteModal{{ $data->id }}" data-toggle="modal"
                                class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Banner</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="{{ route('banner.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="banner_title" class="col-form-label">Banner Title:</label>
                                        <input type="text" name="banner_title" id="banner_title" class="form-control" value="{{ $data->banner_title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="banner_name" class="col-form-label">Banner Name:</label>
                                        <input type="text" name="banner_name" id="banner_name" class="form-control"
                                        value="{{ $data->banner_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="banner_link" class="col-form-label">Banner Link:</label>
                                        <input type="text" name="banner_link" id="banner_link" class="form-control"
                                        value="{{ $data->banner_link }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="banner_image" class="col-form-label">Banner image:</label>
                                        <input type="file" name="banner_image" id="banner_image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="banner_info" class="col-form-label">Banner info:</label>
                                        <textarea name="banner_info" id="banner_info" rows="5" class="form-control">{{ $data->banner_info }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are You Sure to Delete it!</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="{{ route('banner.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <h5 class="text-danger text-center">'{{ $data->banner_name }}' will be Deleted!</h5>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Banner Create Modal -->
<div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal">Add Banner</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="banner_title" class="col-form-label">Banner Title:</label>
                        <input type="text" name="banner_title" id="banner_title" class="form-control" placeholder="Enter Banner Title">
                    </div>
                    <div class="form-group">
                        <label for="banner_name" class="col-form-label">Banner Name:</label>
                        <input type="text" name="banner_name" id="banner_name" class="form-control" placeholder="Enter Banner Name">
                    </div>
                    <div class="form-group">
                        <label for="banner_link" class="col-form-label">Banner Link:</label>
                        <input type="text" name="banner_link" id="banner_link" class="form-control" placeholder="Enter Banner Link">
                    </div>
                    <div class="form-group">
                        <label for="banner_image" class="col-form-label">Banner image:</label>
                        <input type="file" name="banner_image" id="banner_image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="banner_info" class="col-form-label">Banner info:</label>
                        <textarea name="banner_info" id="banner_info" rows="5" placeholder="Entr Banner Details" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
