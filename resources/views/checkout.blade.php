@extends('layout.master')

@section('title', 'Checkout')

@section('content')

    <div class="checkout-container">

        <!-- LEFT -->

        <div class="checkout-form">
            <h2>Billing Details</h2>

            <form action="{{ route('order.store') }}" method="POST">
                @csrf
 
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone">
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city">
                </div>
                <div class="form-group"> <label>Your Address</label>
                    <textarea id="address" name="address_order" placeholder="Your location will appear here..."></textarea>
                </div> <!-- BUTTON --> <button type="button" id="location-btn"> Use Current Location </button>
                <div class="form-group">
                    <br>
                    {{-- <label>Payment Method</label> --}}
                    {{-- <select name="payment_method">
                        <option value="cash">Cash On Delivery</option>
                    </select> --}}
                </div>
                <button type="submit" class="place-order-btn">
                    Place Order
                </button>
            </form>

        </div>

        <!-- RIGHT -->

        <div class="order-summary">

            <h2>Your Order</h2>
            @foreach ($card->card_item as $c)
                <div class="summary-item">

                    <span>{{ $c->product->name }}</span>

                    <span>{{ $c->product->sele_price }}$</span>

                </div>
            @endforeach
            <hr>

            <div class="total">

                <span>Total</span>

                <span>{{ $total }}$</span>

            </div>

        </div>

    </div>
    <script>
        document
            .getElementById('location-btn')

            .addEventListener('click', async function() {

                navigator.geolocation.getCurrentPosition(

                    async function(position) {

                        let lat = position.coords.latitude;

                        let lon = position.coords.longitude;

                        let response = await fetch(

                            `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`

                        );

                        let data = await response.json();

                        document.getElementById('address').value =

                            data.display_name;

                    }

                );

            });
    </script>
@endsection
