@extends('backend.master')
@section('banner')
active
@endsection

@section('title')
New Order
@endsection

@section('content')
@include('backend.layouts.components.status')


<div class="row">
    <div class="col-lg-12 mx-auto pt-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">New Order</h4>
            </div>
        </div>
        <table class="table table-bordered stripe">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Cupon</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Total</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $data)
                {{-- {{ $data }} --}}
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->cupon_name }}</td>
                        <td>{{ $data->subtotal }}</td>
                        <td>{{ $data->discount_amount }}</td>
                        <td>{{ $data->total }}</td>
                        <td>{{ $data->transaction_id }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('order.show',$data->id) }}"
                                 class="btn btn-dark"><i class="fa fa-eye"></i></a>
                                <a href="#deleteModal{{ $data->id }}" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                {{-- @foreach ($banner as $data)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $data->banner_title }}</td>
                    <td>{{ $data->banner_name }}</td>
                    <td>{{ $data->banner_link }}</td>
                    <td>
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
                </tr> --}}

                <!-- Edit Modal -->
                {{-- <div class="modal fade" id="editModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                </div> --}}
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
</div>


@endsection
