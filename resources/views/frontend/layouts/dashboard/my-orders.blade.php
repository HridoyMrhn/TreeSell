@extends('frontend.master')

@section('myOrders')
active
@endsection

@section('title')
My Orders || Dashboard
@endsection
@section('content')


<div class="container">
    <div class="row pb-2">
        <div class="col-lg-3 p-0 mt-4">
            @include('frontend.layouts.components.dashboard-sidebar')
        </div>

        <div class="col-lg-9">
            <div class="card p-2 card-body mt-4">
                <div class="border-top mt-3">
                    <div class="uploaded-trees">
                        <div class="container">
                            <h2>My Orders item</h2>
                                <table class="table table-responsive-lg text-center table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Dicount</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $data)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $data->created_at }}</td>
                                                <td>{{ $data->subtotal }}</td>
                                                <td>{{ $data->discount_amount }}</td>
                                                <td>{{ $data->total }}</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="{{ route('user.dashboard.orderShow',$data->id) }}"
                                                         class="btn btn-dark"><i class="fa fa-eye"></i></a>
                                                        <a href="#deleteModal{{ $data->id }}" data-toggle="modal" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                                        <a href="{{ route('user.invoice.download', $data->id) }}" class="btn-default">Downlaod</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are You Sure to Delete it!??</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                              </button>
                                                        </div>
                                                        <form action="{{ route('order.destory', $data->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <h5 class="text-danger text-center">Order '{{ $data->id }}' will be Deleted!</h5>
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

                                        @empty
                                            <tr>
                                                <td colspan="60" class="text-danger font-weight-bold">No Product Avialable Here!</td>
                                            </tr>



                                        @endforelse
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
