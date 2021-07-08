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
                        <td>{{ $data->payment_gatway_name  }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('order.show',$data->id) }}"
                                 class="btn btn-dark"><i class="fa fa-eye"></i></a>
                                <a href="#deleteModal{{ $data->id }}" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>

                <!-- Delete Modal -->
                <div class="modal fade" id="deleteModal{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are You Sure to Delete it!??</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="{{ route('order.destory', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <h5 class="text-danger text-center">'{{ $data->user->name }}' Order will be Deleted!</h5>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-danger" type="submit">Delete</button>
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


@endsection
