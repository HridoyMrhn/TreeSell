@extends('backend.master')
@section('cupon')
active
@endsection

@section('title')
Cupon
@endsection
@section('content')

@include('backend.layouts.components.status')

<div class="row">
    <div class="col-lg-12 mx-auto pt-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Cupon</h4>
            </div>
            <div class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Add Cupon</button>
            </div>
        </div>
        <table class="table table-bordered data-table table-striped ">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">P.A</th>
                    <th scope="col">D.A</th>
                    <th scope="col">Validity</th>
                    <th scope="col">image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cupons as $data)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $data->cupon_name }}</td>
                    <td>{{ $data->purchase_amount }}</td>
                    <td>{{ $data->discount_percentage }}</td>
                    <td>{{ $data->discount_percentage }}</td>
                    <td>{{ $data->cupon_validity }}</td>
                    <td>
                        <img src="{{ url('uploads/cupon/'.$data->cupon_image) }}" alt="{{ $data->cupon_name }}" style="width:60px; height:50px; line-height:50px">
                    </td>
                    <td>{{ $data->status }}</td>
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
                                <h5 class="modal-title" id="exampleModalLabel">Edit Cupon</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="{{ route('cupon.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="cupon_name" class="col-form-label">Cupon Name:</label>
                                        <input type="text" name="cupon_name" id="cupon_name" class="form-control" value="{{ $data->cupon_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="purchase_amount" class="col-form-label">Purchase Amount:</label>
                                        <input type="number" name="purchase_amount" id="purchase_amount" class="form-control" value="{{ $data->purchase_amount }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="discount_percentage" class="col-form-label">Discount Percentage(%):</label>
                                        <input type="text" name="discount_percentage" id="discount_percentage" class="form-control" value="{{ $data->discount_percentage }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cupon_validity" class="col-form-label">Cupon Validity:</label>
                                        <input type="date" name="cupon_validity" id="cupon_validity" class="form-control" value="{{ $data->cupon_validity}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="cupon_image" class="col-form-label">Cupon image:</label>
                                        <input type="file" name="cupon_image" id="cupon_image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="cupon_info" class="col-form-label">Cupon info:</label>
                                        <textarea name="cupon_info" id="cupon_info" rows="5" class="form-control">{{ $data->cupon_info }}</textarea>
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
                            <form action="{{ route('cupon.destroy', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <h5 class="text-danger text-center">'{{ $data->cupon_name }}' will be Deleted!</h5>
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


<!-- Cupon Create Modal -->
<div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal">Add Cupon</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('cupon.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cupon_name" class="col-form-label">Cupon Name:</label>
                        <input type="text" name="cupon_name" id="cupon_name" class="form-control" placeholder="Enter Cupon Name">
                    </div>
                    <div class="form-group">
                        <label for="purchase_amount" class="col-form-label">Purchase Amount:</label>
                        <input type="number" name="purchase_amount" id="purchase_amount" class="form-control" placeholder="Enter Purchase Amount">
                    </div>
                    <div class="form-group">
                        <label for="discount_percentage" class="col-form-label">Discount Percentage(%):</label>
                        <input type="number" name="discount_percentage" id="discount_percentage" class="form-control" placeholder="Enter Discount Percentage(%)">
                    </div>
                    <div class="form-group">
                        <label for="cupon_validity" class="col-form-label">Cupon Validity:</label>
                        <input type="date" name="cupon_validity" id="cupon_validity" class="form-control" placeholder="Cupon validity Date">
                    </div>
                    <div class="form-group">
                        <label for="cupon_image" class="col-form-label">Cupon image:</label>
                        <input type="file" name="cupon_image" id="cupon_image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="cupon_info" class="col-form-label">Cupon info:</label>
                        <textarea name="cupon_info" id="cupon_info" rows="5" placeholder="Cupon Details" class="form-control"></textarea>
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
