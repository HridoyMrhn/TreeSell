@extends('backend.master')
@section('tree')
active
@endsection

@section('title')
Tree List
@endsection

@section('content')
@include('backend.layouts.components.status')

<div class="row">
    <div class="col-lg-12 mx-auto pt-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Tree</h4>
            </div>
            <div class="pull-right">
                <a href="{{ route('tree.create') }}" class="btn btn-primary">Add Tree</a>
            </div>
        </div>
        <table class="table table-bordered table-striped  table-responsive-lg">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Size</th>
                    <th scope="col">image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trees as $data)
                <tr>
                    <td>{{ $loop->index + $trees->firstItem() }}</td>
                    <td>{{ $data->tree_name }}</td>
                    <td>{{ $data->treeWithCategeoy->category_name }}</td>
                    <td>
                        <li>Width: {{ $data->tree_width }}</li>
                        <li>Height: {{ $data->tree_height }}</li>
                    </td>
                    <td>
                        <img class="rounded-circle" src="{{ asset('uploads/tree/'.$data->multipleImage->first()->tree_image) }}" alt="{{ $data->tree_name }}" style="width:50px; height:50px; line-height:50px">
                    </td>
                    <td>
                        @if ($data->status == 'pending')
                            <form action="{{ route('tree.approve', $data->id) }}" method="post">
                                @csrf
                                <button type="submit" class="badge badge-danger"><i class="fa fa-times"></i> Pending</button>
                            </form>
                        @elseif($data->status == 'approved')
                            <form action="{{ route('tree.unapprove', $data->id) }}" method="post">
                                @csrf
                                <button type="submit" class="badge badge-success"><i class="fa fa-check"></i> Approve</button>
                            </form>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            {{-- <a href="#editModal{{ $data->id }}" data-toggle="modal" class="btn btn-primary"><i class="fa fa-eye"></i></a> --}}
                            <a href="#editModal{{ $data->id }}" data-toggle="modal" class="btn btn-dark"><i class="fa fa-edit"></i></a>
                            <a href="#deleteModal{{ $data->id }}" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </div>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Tree</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="{{ route('tree.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="tree_name" class="col-form-label">Tree Name:</label>
                                            <input type="text" name="tree_name" id="tree_name" class="form-control" value="{{ $data->tree_name }}">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="category_id" class="col-form-label">Tree Category:</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $data->category_id == $category->id ? 'selected':'' }}>{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="tree_scientific_name" class="col-form-label">Scientific Name:</label>
                                            <input type="text" name="tree_scientific_name" id="tree_scientific_name" class="form-control" value="{{ $data->tree_scientific_name }}">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="tree_price" class="col-form-label">Tree Price:</label>
                                            <input type="text" name="tree_price" id="tree_price" class="form-control" value="{{ $data->tree_price }}">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="tree_width" class="col-form-label">Tree Width:</label>
                                            <input type="text" name="tree_width" id="tree_width" class="form-control" value="{{ $data->tree_width }}">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="tree_height" class="col-form-label">Tree Height:</label>
                                            <input type="text" name="tree_height" id="tree_height" class="form-control" value="{{ $data->tree_height }}">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="tree_quantity" class="col-form-label">Tree Quantity:</label>
                                            <input type="number" name="tree_quantity" id="tree_quantity" class="form-control" value="{{ $data->tree_quantity }}">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="tree_location" class="col-form-label">Tree Location:</label>
                                            <input type="text" name="tree_location" id="tree_location" class="form-control" value="{{ $data->tree_location }}">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="tree_image" class="col-form-label">Tree image:</label>
                                            <input type="file" name="tree_image[]" id="tree_image" class="form-control" multiple>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="tree_info" class="col-form-label">Tree Short Info:</label>
                                            <textarea name="tree_info" id="tree_info" rows="5" class="form-control">{{ $data->tree_info }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="tree_description" class="col-form-label">Tree Description:</label>
                                            <textarea name="tree_description" id="tree_description" rows="5" class="form-control">{{ $data->tree_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="submit">Update</button>
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
                            <form action="{{ route('tree.destroy', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <h5 class="text-danger text-center">'{{ $data->tree_name }}' will be Deleted!</h5>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-danger" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
        <div class="py-4">
            {{ $trees->links() }}
        </div>
    </div>
</div>

@endsection


@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#tree_description'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
