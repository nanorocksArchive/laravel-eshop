@extends('layout.master')
@section('title')
    Cart
@stop
@section('sidebar')
@stop
@section('text')
@stop
@section('content')
    <section class="header_text sub">
        <img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
        <h4><span>Shopping Cart</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <h4 class="title"><span class="text"><strong>Your</strong> Cart</span></h4>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $sumSubTotal = 0;
                    @endphp
                    @if(\App\Support\Storage\CartStorage::count() !== 0)
                    @foreach($basket as $product)
                        <tr>
                            <td style="vertical-align: middle;padding: 20px;"><a href="{{ route('update.cart', ['slug' => $product->slug, 'quantity' => 0]) }}"><i class="fas fa-times" style="font-size: 23px"></i></a></td>
                            <td><a href="{{ route('index.product', $product->slug) }}"><img alt="" src="{{ $product->image }}" style="width: 25%"></a></td>
                            <td><a href="{{ route('index.product', $product->slug) }}">{{ $product->title }}</a></td>
                            <td>
                                <input type="number" min="1" max="{{ $product->stock }}" placeholder="1" class="input-mini" id="input-quantity" value="{{ $product->quantity }}" onchange="window.location.href='/cart/update/{{$product->slug}}/' + document.getElementById('input-quantity').value">
                            </td>
                            <td>${{ $product->price }}</td>
                            <td>${{ $product->price * $product->quantity }}</td>
                        </tr>
                        @php
                            $sumSubTotal += $product->price * $product->quantity;
                        @endphp
                    @endforeach
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="2">
                            <p class="cart-total right">
                                <strong>Shipping</strong>: $15.00<br>
                                <strong>Sub-Total</strong>:	${{ $sumSubTotal }}<br><br>
                                <strong style="font-size: 1rem;">Total: ${{ $sumSubTotal + 15.00 }}</strong>
                            </p>
                        </td>
                    </tr>
                    @else
                        <tr>
                            <td colspan="6">
                                <p class="cart-total">
                                    Your cart is currently empty. <a href="{{ route('index.home') }}">Go shopping!!!</a>
                                </p>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                <hr>
                @if(\App\Support\Storage\CartStorage::count() !== 0)
                <p class="buttons center">

                    <a href="{{ route('index.home') }}" class="btn btn-large" type="button">Go shopping</a>
                    <a href="{{ route('index.checkout') }}" class="btn btn-large btn-inverse" type="submit" id="checkout">Checkout</a>
                </p>
                @endif
            </div>
        </div>
    </section>
@stop
@section('js')
    @parent
    <script src="{{ asset('themes/js/common.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#checkout').click(function (e) {
                document.location.href = "/checkout";
            })
        });
    </script>
@stop
