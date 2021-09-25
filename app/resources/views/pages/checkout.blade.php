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
                    <div class="span8" style="padding: 20px;">
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
                                $productIds = [];
                            @endphp
                            @foreach($basket as $product)
                                <tr>
                                    <td>{{ $product->title }} <strong>X {{ $product->quantity }}</strong></td>
                                    <td>${{ $product->price * $product->quantity }}</td>
                                </tr>
                                @php
                                    $sumSubTotal += $product->price * $product->quantity;
                                    array_push($productIds, ['id' => $product->id]);
                                @endphp
                            @endforeach
                            <tr>
                                <td><strong>Shipping:</strong></td>
                                <td>$15.00</td>
                            </tr>
                            <tr style="font-size: 1.2rem;">
                                <td><strong>Total:</strong></td>
                                <td style="font-weight: 900">${{ $sumSubTotal + 15.00 }}</td>
                                <input type="hidden" id="productIds" value="{{ json_encode($productIds,TRUE)}}">
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
                            <div class="span12">
                                <div class="control-group">
                                    <label class="control-label">Payment gateway</label>
                                    <div class="controls">
                                        <select id="paymentGateway" style="width: 100%">
                                            <option value="braintree" selected>BrainTree</option>
                                            <option value="stripe">Stripe</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row-fluid d-none" id="brainTreeBlock">
                            <div id="dropin-container"></div>
                            <hr>
                            <button class="btn btn-inverse pull-right" type="button" id="submitButton">Confirm order
                                <span class="d-none" id="submitButtonSpinner"><i class="fas fa-spinner"></i></span>
                            </button>
                            @csrf
                        </div>
                        <div class="row-fluid" id="stripeBlock">
                            <form id="stripePaymentForm">
                                <div id="card-element"><!--Stripe.js injects the Card Element--></div>
                                <hr>
                                <button class="btn btn-inverse pull-right" type="button" id="stripeSubmit">
                                    <span id="stripeButtonText">Confirm order Stripe</span>
                                    <span class="spinner d-none" id="stripeSpinner"><i class="fas fa-spinner"></i></span>
                                </button>
                                <div id="stripeCardError" role="alert"></div>
                                <p class="result-message hidden">
                                    Payment succeeded, see the result in your
                                    <a href="" target="_blank">Stripe dashboard.</a> Refresh the page to pay again.
                                </p>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop
@section('js')
    @parent
    <script src="https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>

    <script src="{{ asset('themes/js/common.js') }}"></script>
    <script>

        function getPaymentTokenBrainTree() {
            fetch('{{ route('order.checkout.paymentToken') }}', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({"type": 'braintree', "_token": "{{ csrf_token() }}"})
            })
                .then(res => res.json())
                .then(res => {
                    paymentIntegrationBrainTree(res.token);
                });
        }

        function paymentIntegrationBrainTree(token) {
            braintree.dropin.create({
                authorization: token,
                selector: '#dropin-container'
            }, function (err, instance) {
                document.getElementById('submitButton').addEventListener('click', () => {
                    document.getElementById('submitButtonSpinner').classList.remove('d-none');

                    let body = getFormContent();
                    makePaymentRequestBrainTree(body, err, instance)
                });

            })
        }

        function getFormContent(disabled = true)
        {
            let form = document.getElementById('orderForm');
            let formData = Array.from(new FormData(form))
            let body = {}
            for (const item in formData) {
                body[formData[item][0]] = formData[item][1];
                // document.getElementsByName(formData[item][0])[0].setAttribute("disabled", "")
            }

            return body;
        }

        function makePaymentRequestBrainTree(body, err, instance) {
            instance.requestPaymentMethod((err, payload) => {
                fetch('{{ route('order.checkout') }}', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({"type": 'braintree', "_token": "{{ csrf_token() }}", 'paymentMethodNonce': payload.nonce, ...body})
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

                    if (result.status == 200) {
                        Swal.fire(
                            'Good job!',
                            result.message,
                            'success'
                        )

                        setTimeout(() => {
                            window.location.href = result.href;
                        }, 5000);
                    } else {
                        Swal.fire(
                            'Try again!',
                            result.message,
                            'error'
                        )

                        setTimeout(() => {
                            window.location.href = "{{ route('index.home') }}";
                        }, 5000);
                    }
                })

            });
        }

        function getPaymentTokenStripe() {

            let stripe = Stripe("{{ env('STRIPE_PUBLIC_KEY') }}");

            document.getElementById("stripeSubmit").disabled = true;

            fetch("{{ route('order.checkout.paymentToken') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    "type": 'stripe',
                    "items": document.getElementById('productIds').value,
                    "_token": "{{ csrf_token() }}"
                })
            }).then(result => result.json())
                .then(function (data) {
                    let elements = stripe.elements();
                    let style = {
                        base: {
                            color: "#32325d",
                            fontFamily: 'Arial, sans-serif',
                            fontSmoothing: "antialiased",
                            fontSize: "16px",
                            "::placeholder": {
                                color: "#32325d"
                            }
                        },
                        invalid: {
                            fontFamily: 'Arial, sans-serif',
                            color: "#fa755a",
                            iconColor: "#fa755a"
                        }
                    };
                    var card = elements.create("card", {style: style});
                    // Stripe injects an iframe into the DOM
                    card.mount("#card-element");
                    card.on("change", function (event) {
                        // Disable the Pay button if there are no card details in the Element
                        document.getElementById("stripeSubmit").disabled = event.empty;
                        document.querySelector("#stripeCardError").textContent = event.error ? event.error.message : "";
                    });

                    document.getElementById("stripeSubmit").addEventListener("click", function (e) {
                        e.preventDefault();
                        // Complete payment when the submit button is clicked
                        paymentIntegrationStripe(stripe, card, data.token);
                    });
                });
        }

        function paymentIntegrationStripe(stripe, card, clientSecret) {
            loading(true);
            stripe
                .confirmCardPayment(clientSecret, {
                    payment_method: {
                        card: card
                    }
                })
                .then(function (result) {
                    makePaymentRequestStripe(getFormContent(), result)
                });
        }

        function loading(isLoading) {
            if (isLoading) {
                // Disable the button and show a spinner
                document.querySelector("#stripeSubmit").disabled = true;
                document.querySelector("#stripeSpinner").classList.remove("d-none");
            } else {
                document.querySelector("#stripeSubmit").disabled = false;
                document.querySelector("#stripeSpinner").classList.add("d-none");
            }
        }

        function showError(errorMsgText) {
            loading(false);
            var errorMsg = document.querySelector("#stripeCardError");
            errorMsg.textContent = errorMsgText;
            setTimeout(function() {
                errorMsg.textContent = "";
            }, 4000);
        }

        function makePaymentRequestStripe(body, paymentStatus) {
            const paymentId = paymentStatus.error ? null : paymentStatus.paymentIntent.id;
            fetch('{{ route('order.checkout') }}', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({"success": paymentStatus.error ,"paymentId": paymentId, "type": 'stripe', "_token": "{{ csrf_token() }}", ...body})
            }).then(res => {
                return res.json();
            }).then(result => {
                console.log(result,12312323);

                if (!paymentStatus.error) {
                    Swal.fire(
                        'Good job!',
                        result.message,
                        'success'
                    )

                    orderComplete(paymentStatus.paymentIntent.id);

                    setTimeout(() => {
                        window.location.href = result.href;
                    }, 5000);
                } else {
                    showError(paymentStatus.error.message);
                    Swal.fire(
                        'Try again!',
                        result.message,
                        'error'
                    )
                }
            });
        }

        function orderComplete(paymentIntentId) {
            loading(false);
            document
                .querySelector(".result-message a")
                .setAttribute(
                    "href",
                    "https://dashboard.stripe.com/test/payments/" + paymentIntentId
                );
            document.querySelector(".result-message").classList.remove("hidden");
            document.querySelector("#stripeSubmit").disabled = true;
        }

        function paymentGateway() {
            let pg = document.getElementById('paymentGateway');
            selectedPaymentGateway(pg);

            pg.addEventListener('change', (e) => {
                selectedPaymentGateway(pg);
            })
        }

        function selectedPaymentGateway(pg) {
            if (pg.value === 'braintree') {
                document.getElementById('brainTreeBlock').classList.remove('d-none');
                document.getElementById('stripeBlock').classList.add('d-none');
                getPaymentTokenBrainTree();
            } else {
                document.getElementById('brainTreeBlock').classList.add('d-none');
                document.getElementById('stripeBlock').classList.remove('d-none');
                getPaymentTokenStripe();
            }
        }

        window.onload = () => {
            paymentGateway();
        }
    </script>
@stop
