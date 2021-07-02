@extends('backend.master')
@section('category')
active
@endsection

@section('title')
    Category List
@endsection

@section('content')
@include('backend.layouts.components.status')


<div class="row">
    <div class="col-lg-12 mx-auto pt-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Category</h4>
            </div>
            <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Add Category</button>
            </div>
        </div>
        <table class="table table-bordered data-table stripe">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">imager</th>
                    <th scope="col">Parent</th>
                    <th scope="col">info</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $data)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $data->category_name }}</td>
                    <td>
                        <img class="rounded-circle" src="{{ asset('uploads/category/'.$data->category_image) }}" alt="{{ $data->category_image }}" style="width:75px; height:75px; line-height:75px">
                    </td>
                    <td>
                        @if($data->subcategory)
                            @foreach ($data->subcategory as $subCat)
                                <p>{{ $subCat->category_name }}</p>
                            @endforeach
                        @else
                            --
                        @endif
                    </td>
                    <td>{{ $data->category_info }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="#editModal{{ $data->id }}" data-toggle="modal" class="btn btn-dark"><i class="fa fa-edit"></i></a>
                            <a href="#deleteModal{{ $data->id }}" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="{{ route('category.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="parent_id" class="col-form-label">Parent Category:</label>
                                        <select name="parent_id" id="parent_id" class="form-control">
                                            @foreach ($categories as $categoty)
                                                <option value="{{ $categoty->id }}" {{ $categoty->id == $categoty->id ? 'selected':''}}>{{ $categoty->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_name" class="col-form-label">Category Name:</label>
                                        <input type="text" name="category_name" id="category_name" class="form-control"
                                        value="{{ $data->category_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_image" class="col-form-label">Category image:</label>
                                        <input type="file" name="category_image" id="category_image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_info" class="col-form-label">Category info:</label>
                                        <textarea name="category_info" id="category_info" rows="5" class="form-control">{{ $data->category_info }}</textarea>
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
                            <form action="{{ route('category.destroy', $data->id) }}" method="POST" enctype="multipart/form-data">
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
                <h5 class="modal-title" id="exampleModal">Add Category</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_name" class="col-form-label">Parent Category:</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $data)
                            <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_name" class="col-form-label">Category Name:</label>
                        <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Enter Category Name">
                    </div>
                    <div class="form-group">
                        <label for="category_image" class="col-form-label">Category image:</label>
                        <input type="file" name="category_image" id="category_image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category_info" class="col-form-label">Category info:</label>
                        <textarea name="category_info" id="category_info" rows="5" placeholder="Entr Category Details" class="form-control"></textarea>
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
