@extends('frontend.master')
@section('title')
All Contact
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 my-5">
            <h3 class="card-header">Cart List</h3>
            <table class="table table-responsive-lg table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                {{-- {{ Cart::getSubTotal() }} --}}
                <tbody>
                    @foreach ($cartCollection as $data)
                    {{ $data }}
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            <a href="{{ route('user.tree.show', App\Models\Tree::findorFail($data->id)->slug) }}">{{ $data->name }}</a>

                        </td>
                        <td>{{ $data->quantity }}</td>
                        <td>{{ $data->price }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
