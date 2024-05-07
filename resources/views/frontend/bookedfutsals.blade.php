@extends('welcome')
@section('content')
    <section class="Futsal">
        <div class="container">

            <div class="futsal-post">
                <div class="row g-0 bg-body-secondary position-relative">
                    <div class="col-md-6 mb-md-0 p-md-4">
                        <div class="left-image">
                            <img src="{{ $bookedFutsals->thumbnail }}" class="w-100" alt="...">
                        </div>
                    </div>
                    <div class="col-md-6 p-4 ps-md-0">
                        <h5 class="mt-0">Title:- {{ $bookedFutsals->title }}</h5>

                        <h5 class="mt-0">Time Slot:- {{ $bookedFutsals->time_slots }}</h5>
                        <p style="line-height: 35px;"><i class="fa fa-map-marker" aria-hidden="true"></i> Nayabazar-9,
                            Pokhara</p>
                        <div class="price">
                            <p>Rs. 1450/hr</p>
                        </div>

                        <button class="btn payment-button" data-amount="120"  data-id="{{ $bookedFutsals->id }}">Pay Via Khalti</button>

                        <!-- Explode and display time slots with checkboxes -->

                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection

<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var paymentButtons = document.querySelectorAll(".payment-button");

        paymentButtons.forEach(function(button) {
            button.addEventListener("click", function() {
                var amount = parseFloat(button.getAttribute("data-amount"));
                var itemId = button.getAttribute("data-id");

                var config = {
                    "publicKey": "test_public_key_28af381cd221410baf31b558b8e51d89",
                    "productIdentity": itemId,
                    "productName": "Dragon",
                    "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
                    "paymentPreference": [
                        "KHALTI",
                        "EBANKING",
                        "MOBILE_BANKING",
                        "CONNECT_IPS",
                        "SCT",
                    ],
                    "eventHandler": {
                        onSuccess(payload) {
                            $.ajax({
                                type: 'POST',
                                url: "{{ route('khalti.verifyPayment') }}",
                                data: {
                                    token: payload.token,
                                    amount: payload.amount,
                                    itemId: itemId,

                                    "_token": "{{ csrf_token() }}"
                                },
                                success: function(res) {
                                    $.ajax({
                                        type: "POST",
                                        url: "{{ route('khalti.storePayment') }}",
                                        data: {
                                            response: res,
                                            itemId: itemId,
                                            "_token": "{{ csrf_token() }}"
                                        },
                                        success: function(res) {
                                            console.log(
                                                'transaction successful'
                                                );
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Transaction Successful',
                                                text: 'Your payment has been processed successfully!',
                                            });
                                            window.reload();
                                        }
                                    });
                                    console.log(res);
                                }
                            });
                            console.log(payload);
                        },
                        onError(error) {
                            console.log(error);
                        },
                        onClose() {
                            console.log('widget is closing');
                        }
                    }
                };

                var checkout = new KhaltiCheckout(config);
                checkout.show({
                    amount: amount * 100
                });
            });
        });
    });
</script>
