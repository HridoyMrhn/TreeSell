@extends('frontend.master')
@section('title')
Checkout Page
@endsection
@section('content')

<div class="container">
    <h5 class="mt-3 mb-2">
        Checkout Cart Items
    </h5>

    <div class="mx-auto col-6 mt-2 text-center">
        @include('frontend.layouts.components.status')
    </div>

    <div class="row">
        <div class="col-md-9">
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="card card-body p-2">
                        <p>
                            <strong>Bill To: </strong>
                            {{ Auth::user()->name }}
                        </p>
                        <p>
                            <strong>Phone: </strong>
                            {{ Auth::user()->phone_number }}
                        </p>
                        <p>
                            <strong>Email: </strong>
                            {{ Auth::user()->email }}
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="shipping_address">Shipping Address</label>
                            <textarea name="shipping_address" id="shipping_address" rows="3"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-body">
                            <h6>Payment Option: </h6>
                            <hr>
                            <p><strong>Bkash No: </strong> 0121298949348</p>
                            <p><strong>Rocket No: </strong> 01212989493484</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_gatway_name" id="payment_gatway_name1" value="bkash" checked>
                                <label class="form-check-label" for="payment_gatway_name1">Bkash</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_gatway_name" id="payment_gatway_name2" value="rocket">
                                <label class="form-check-label" for="payment_gatway_name2">Rocket</label>
                              </div>
                            <p><input type="number" name="transaction_id" id="transaction_id" placeholder="Enter Transaction id" class="form-control"></p>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Confirm Order
                </button>
            </form>
        </div>

        <div class="col-md-3">
            <div class="card card-body p-2">
                <p>Total Amount: <strong>{{ Cart::getTotal() }} BDT</strong></p>

                @if (session('discount_amount'))
                    <p>Discount Amount: <strong> {{ session('discount_amount') }}</strong></p>
                    <p>Shipping Cost: <strong> 50 BDT</strong></p>
                    <hr class="my-0">
                    <p><strong>Grand Total: {{ (Cart::getTotal() - session('discount_amount')) + 50 }} BDT</strong></p>
                @else

                    <p>Shipping Cost: <strong> 50 BDT</strong></p>
                    <p><strong>Grand Total: {{ Cart::getTotal() + 50 }} BDT</strong></p>
                @endif

                <p class="text-center">
                    <a href="{{ route('cart.index') }}" class="btn btn-danger"><i class="fa fa-edit"></i> Change Cart
                        Items</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>
    </script>
@endsection
