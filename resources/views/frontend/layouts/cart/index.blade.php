@extends('frontend.master')
@section('title')
Cart Page
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="mx-auto col-6 mt-2 text-center">
                @include('frontend.layouts.components.status')
                @if($cupon_error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong class="text-dark">{{ $cupon_error }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif($discount_amount)
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong class="text-dark">{{ $discount_amount }} $ Discount!</strong>
                        <br> if You Use This Cupon: {{ $cupon_name }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>

            <h3 class="card-header">Cart List</h3>
            <table class="table table-responsive-lg text-center table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (Cart::getContent() as $data)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>
                            <a href="{{ route('user.tree.show', App\Models\Tree::findorFail($data->id)->slug) }}">{{ $data->name }}</a>
                        </td>
                        <td>{{ $data->price }}</td>
                        <td>
                            <form action="{{ route('cart.update', $data->id) }}" method="post">
                                @csrf
                                {{-- @method('PUT') --}}
                                <input type="number" name="quantity" value="{{ $data->quantity }}" min="1" class="form-control w-50 d-inline">
                                <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
                            </form>
                        </td>
                        <td>{{ $data->price * $data->quantity}}</td>
                        <td>
                            <div class="btn btn-group">
                                <form action="{{ route('cart.destroy', $data->id) }}" method="get">
                                    @csrf
                                    {{-- @method('DELETE') --}}
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="60" class="text-danger font-weight-bold">No Product Avialable Here!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h3>Cupon</h3>
            <p>Enter Your Cupon Code if You Have One</p>
            <div class="form-group">
                <input type="text" name="apply_cupon_input" id="apply_cupon_input" placeholder="Cupon Code" class="form-control mb-3" value="{{ $cupon_name }}">
                <button type="button" class="btn btn-danger" id="apply_cupon_btn">Apply Cupon</button>
            </div>
            @foreach ($cupons as $data)
                <div class="btn btn-group btn-group-sm pl-0">
                    <button value="{{ $data->cupon_name }}" type="button" class="btn btn-success btn_add_cupon"><h5 class="d-inline-block">{{ $data->cupon_name }}</h5></button>
                    <span class="btn btn-dark">You Have to Shopping Mora Than <h5 class="d-inline-block">{{ $data->purchase_amount }}</h5> Taka</span>
                </div>
            @endforeach
        </div>

        <div class="col-lg-6 col-md-10">
            <div class="text-right">
                <h3>Cart Totals</h3>
                <ul class="list-unstyled ">
                    @if($discount_amount)
                        <li><span class="mr-5">Total </span> {{ Cart::getTotal() }}</li>
                        <li><span class="mr-5">Discount </span>
                            {{ (Cart::getTotal() * $discount_amount) / 100 }}
                        </li>
                        @php
                            session(['discount_amount' => (Cart::getTotal() * $discount_amount) / 100 ]);
                            session(['cupon_name' => $cupon_name ]);
                            session(['discount_amonut' => $discount_amount ]);

                        @endphp
                        <li><span class="font-weight-bold mr-5">Grand Total</span>
                            {{ Cart::getTotal() - ((Cart::getTotal() * $discount_amount) / 100) }}
                        </li>
                    @else
                        <li><span class="mr-5">Grand Total </span> {{ Cart::getTotal() }}</li>
                    @endif
                </ul>
            <a href="{{ route('tree.recent') }}" class="btn d-inline btn-secondary">Continue Shopping</a>
            <a href="{{ route('checkout.index') }}" class="btn d-inline btn-outline-danger">Proceed to Checkout</a>
        </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#apply_cupon_btn').click(function() {
                var input_cupon_value = $('#apply_cupon_input').val();
                var cupon_btn_link = "{{ url('cart') }}/"+input_cupon_value;
                // alert(cupon_btn_link);
                window.location.href = cupon_btn_link ;
            });

            $('.btn_add_cupon').click(function() {
                // var btn_value = $('.btn_add_cupon').val();
                // alert(btn_value);
                $('#apply_cupon_input').val($(this).val())
            })
        });
    </script>
@endsection
