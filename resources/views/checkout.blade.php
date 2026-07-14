@extends('layout.master')

@section('title', 'Checkout')

@section('content')

    <section class="section">

        <div class="container">

            {{-- Header --}}

            <div class="section-header">

                <div>

                    <h1 class="section-title">

                        Checkout

                    </h1>

                    <p class="section-subtitle">

                        Complete your order by filling in your billing information.

                    </p>

                </div>

            </div>

            <div class="checkout-layout">

                {{-- ===========================
                Billing Details
            ============================ --}}

                <div class="card">

                    <div class="card-body">

                        <h2 class="checkout-title">

                            Billing Details

                        </h2>

                        <form action="{{ route('order.store') }}" method="POST">

                            @csrf

                            <div class="form-group">

                                <label class="form-label">

                                    Phone Number

                                </label>

                                <input type="text" name="phone" class="form-control"
                                    placeholder="Enter your phone number">

                            </div>

                            <div class="form-group">

                                <label class="form-label">

                                    City

                                </label>

                                <input type="text" name="city" class="form-control" placeholder="Enter your city">

                            </div>

                            <div class="form-group">

                                <label class="form-label">

                                    Delivery Address

                                </label>

                                <textarea id="address" name="address_order" class="form-control" rows="5" placeholder="Enter your address"></textarea>

                            </div>

                            <div class="checkout-actions">

                                <button type="button" id="location-btn" class="btn btn-outline btn-block">

                                    📍 Use Current Location

                                </button>

                                <button type="submit" class="btn btn-primary btn-block">

                                    Place Order

                                </button>

                            </div>
                        </form>

                    </div>

                </div>

                {{-- ===========================
                Order Summary
            ============================ --}}

                <div class="card checkout-summary">

                    <div class="card-body">

                        <h2>

                            Order Summary

                        </h2>

                        @foreach ($card->card_item as $item)
                            <div class="summary-row">

                                <span>

                                    {{ $item->product->name }}

                                    ×

                                    {{ $item->quantity }}

                                </span>

                                <span>

                                    ${{ number_format($item->quantity * $item->product->sele_price, 2) }}

                                </span>

                            </div>
                        @endforeach

                        <div class="summary-total">

                            <span>

                                Total

                            </span>

                            <span>

                                ${{ number_format($total, 2) }}

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <script>
        document.getElementById('location-btn').addEventListener('click', async function() {

            if (!navigator.geolocation) {

                alert("Geolocation is not supported.");

                return;

            }

            navigator.geolocation.getCurrentPosition(

                async function(position) {

                        let lat = position.coords.latitude;

                        let lon = position.coords.longitude;

                        let response = await fetch(

                            `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`

                        );

                        let data = await response.json();

                        document.getElementById('address').value = data.display_name;

                    },

                    function() {

                        alert("Unable to retrieve your location.");

                    }

            );

        });
    </script>

@endsection
