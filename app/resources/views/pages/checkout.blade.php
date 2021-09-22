@extends('layout.master')
@section('title')
    Checkout
@stop
@section('sidebar')
@stop
@section('text')
@stop
@section('content')
    <section class="header_text sub">
        <img class="pageBanner" src="{{ asset('themes/images/pageBanner.png') }}" alt="New products">
        <h4><span>Shopping Cart</span></h4>
    </section>
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <form id="orderForm" class="row-fluid">
                    <div class="span6" style="padding: 20px;">
                        <h4>Billing and Shipping</h4>
                        <hr>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">First Name</label>
                                    <div class="controls">
                                        <input type="text" name="firstname" placeholder="First name" value="Andrej">
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Last Name</label>
                                    <div class="controls">
                                        <input type="text" name="lastname" placeholder="Last name" value="Nankov">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Email Address</label>
                                    <div class="controls">
                                        <input type="text" name="email" placeholder="Email" value="an@gmail.com">
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Telephone</label>
                                    <div class="controls">
                                        <input type="text" name="phone" placeholder="Telephone" value="07123321">
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
                                               value="ul. Hristo Tatarcev">
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label">Street number:</label>
                                    <div class="controls">
                                        <input type="text" name="address2" placeholder="Street number" value="47-5/14">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label"><span class="required">*</span> City:</label>
                                    <div class="controls">
                                        <input type="text" name="city" placeholder="City" value="Skopje">
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label"><span class="required">*</span> Post Code:</label>
                                    <div class="controls">
                                        <input type="text" name="post_code" placeholder="Post code" value="1000">
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
                                            <option value="Macedonia" selected>Macedonia</option>
                                            <option value="2">Albania</option>
                                            <option value="3">Algeria</option>
                                            <option value="4">American Samoa</option>
                                            <option value="5">Andorra</option>
                                            <option value="6">Angola</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="control-group">
                                    <label class="control-label"><span class="required">*</span> Region / State:</label>
                                    <div class="controls">
                                        <select name="state">
                                            <option value=""> --- Please Select ---</option>
                                            <option value="kisela-voda" selected>Kisela voda</option>
                                            <option value="3514">Aberdeenshire</option>
                                            <option value="3515">Anglesey</option>
                                            <option value="3516">Angus</option>
                                            <option value="3517">Argyll and Bute</option>
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
                                              class="span12">I want fast shipment</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="control-group">
                                <label class="checkbox">
                                    <input type="checkbox" name="receiveEmailNotifications" id="email-check"
                                           value="option1" checked>
                                    Receive email notifications for news and discounts
                                </label>
                            </div>
                            <div class="control-group">
                                <label class="checkbox">
                                    <input type="checkbox" name="createAccount" id="email-check" value="option1">
                                    Do you want to create account ?
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="span6" style="background: #e5e5e5;padding: 20px;">
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
                            @foreach($basket as $product)
                                <tr>
                                    <td>{{ $product->title }} X {{ $product->quantity }}</td>
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
                        <div class="row-fluid">
                            <div id="dropin-container"></div>
                            <button class="btn btn-inverse pull-right" type="button" id="submitButton">Confirm order
                            </button>
                            @csrf
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop
@section('js')
    @parent
    <script src="{{ asset('themes/js/common.js') }}"></script>
    <script>
        function paymentIntegration() {
            braintree.dropin.create({
                authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
                selector: '#dropin-container'
            }, function (err, instance) {
                document.getElementById('submitButton').addEventListener('click', () => {
                    let form = document.getElementById('orderForm');
                    let formData = Array.from(new FormData(form))
                    let body = {}
                    for (const item in formData) {
                        body[formData[item][0]] = formData[item][1];
                    }

                    makePaymentRequest(body, err, instance)
                });

            })
        }

        function makePaymentRequest(body, err, instance)
        {
            instance.requestPaymentMethod((err, payload) => {
                // Submit payload.nonce to your server
                console.log(payload.nonce);
                fetch('{{ route('order.checkout') }}', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({'paymentMethodNonce': payload.nonce, ...body})
                }).then(res => {
                    return res.json();
                }).then(result => {
                    instance.teardown(function (teardownErr) {
                        if (teardownErr) {
                            console.error('Could not tear down Drop-in UI!');
                        } else {
                            console.info('Drop-in UI has been torn down!');

                            document.getElementById('submitButton').remove();
                        }
                    });

                    if (result.success) {
                        console.log('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>')
                    } else {
                        console.log(result,'<h1>Error</h1><p>Check your console.</p>');
                    }
                })

            });
        }


        paymentIntegration();

    </script>
@stop
