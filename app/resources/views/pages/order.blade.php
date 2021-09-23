@extends('layout.master')
@section('title')
    Order details
@stop
@section('sidebar')
@stop
@section('text')
@stop
@section('content')
    <section class="header_text sub">
        <img class="pageBanner" src="{{ asset('themes/images/pageBanner.png') }}" alt="New products">
        <h4><span>Order details</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <form id="orderForm" class="row-fluid">
                    <div class="span8" style="padding: 20px;">
                        <h4>Billing and Shipping</h4>
                        <hr>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">First Name</label>
                                    <div class="controls">
                                        <input type="text" name="firstname" placeholder="First name" value="{{ $order->firstname }}">
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Last Name</label>
                                    <div class="controls">
                                        <input type="text" name="lastname" placeholder="Last name" value="{{ $order->lastname }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Email Address</label>
                                    <div class="controls">
                                        <input type="text" name="email" placeholder="Email" value="{{ $order->email }}">
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Telephone</label>
                                    <div class="controls">
                                        <input type="text" name="phone" placeholder="Telephone" value="{{ $order->phone }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label"><span class="required">*</span> Street:</label>
                                    <div class="controls">
                                        <input type="text" name="address1" placeholder="Street"
                                               value="{{ $order->address_1 }}">
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Street number:</label>
                                    <div class="controls">
                                        <input type="text" name="address2" placeholder="Street number" value="{{ $order->address_2 }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label"><span class="required">*</span> City:</label>
                                    <div class="controls">
                                        <input type="text" name="city" placeholder="City" value="{{ $order->city }}">
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label"><span class="required">*</span> Post Code:</label>
                                    <div class="controls">
                                        <input type="text" name="post_code" placeholder="Post code" value="{{ $order->post_code }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label"><span class="required">*</span> Country:</label>
                                    <div class="controls">
                                        <select name="country">
                                            @php
                                                $dummyData = ['2' => 'Albania', 'Macedonia' => 'Macedonia', '3' => 'Angola'];
                                            @endphp
                                            @foreach($dummyData as $key => $option)
                                                <option value="{{ $key }}" {{ ( $order->country == $key) ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label"><span class="required">*</span> Region / State:</label>
                                    <div class="controls">
                                        <select name="state">
                                            @php
                                                $dummyData = ['' => '--- Please Select ---', 'kisela-voda' => 'Kisela voda', '3514' => 'Aberdeenshire'];
                                            @endphp
                                            @foreach($dummyData as $key => $option)
                                                <option value="{{ $key }}" {{ ( $order->state == $key) ? 'selected' : '' }}>{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="control-group">
                                <label for="textarea" class="control-label">Comments</label>
                                <div class="controls">
                                    <textarea rows="3" id="textarea" name="comment" placeholder="Enter comment ..."
                                              class="span12">{{ $order->comment }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span4" style="background: #e5e5e5;padding: 20px;">
                        <h4>Your order</h4>
                        <hr>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Your items</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $sumSubTotal = 0;
                            @endphp
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->title }} <strong>X {{ $product->quantity }}</strong></td>
                                    <td>${{ $product->price * $product->quantity }}</td>
                                </tr>
                                @php
                                    $sumSubTotal += $product->price * $product->quantity;
                                @endphp
                            @endforeach
                            <tr>
                                <td><strong>Shipping:</strong></td>
                                <td>$15.00</td>
                            </tr>
                            <tr style="font-size: 1.2rem;">
                                <td><strong>Total:</strong></td>
                                <td style="font-weight: 900">${{ $sumSubTotal + 15.00 }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <hr>
                        <h4>What is your preferred payment option?</h4>
                        <p>To complete the baying proccess you need to check the payment option and continue to checkout
                            button.</p>
                        <label class="radio">
                            <input type="radio" name="paymentOption" id="paymentOption1" value="cart" checked="">
                            Pay with credit/debit cart
                        </label>
                        <label class="radio">
                            <input type="radio" name="paymentOption" id="paymentOption2" value="on arrive">
                            Pay when arrive
                        </label>
                        <hr>

                    </div>
                </form>
            </div>
        </div>
    </section>
@stop
@section('js')
    @parent
    <script>
        let form = document.getElementById('orderForm');
        let formData = Array.from(new FormData(form))
        for (const item in formData) {
            document.getElementsByName(formData[item][0])[0].setAttribute("disabled", "")
        }
    </script>
@stop
