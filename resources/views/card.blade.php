@extends('layout.master')
@section('title', 'Card')
@section('content')
    <section class="cart-section">

        <h1 class="cart-title">
            Shopping Cart
        </h1>
        @if ($card)
            <div class="cart-container">

                <!-- Cart Items -->

                <div class="cart-items">

                    <!-- Item 1 -->
                    @foreach ($card->card_item as $c)
                        <div class="cart-item">
                            <img src="{{ asset('storage/' . $c->product->image) }}" alt="">
                            <div class="item-details">
                                <h3>{{ $c->product->name }}</h3>
                                {{-- {{ $total+= $c->quantity * $c->price }} --}}
                                <div class="price">${{ $c->quantity * $c->product->sele_price }}</div>

                                <div class="quantity">
                                    <form action="{{ route('decrease_item', $c->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <BUTton type="submit">-</BUTton>
                                    </form>
                                    <span>{{ $c->quantity }}</span>
                                    <form action="{{ route('increment_item', $c->id) }}" method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit">
                                            +
                                        </button>

                                    </form>
                                </div>

                            </div>
                            <form action="{{ route('delete_item', $c->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="remove">
                                    Remove
                                </button>
                            </form>
                        </div>
                    @endforeach
                    <!-- Item 2 -->
                    <h3>No Item</h3>
                </div>

                <!-- Summary -->

                <div class="summary">

                    <h2>Order Summary</h2>

                    <div class="summary-item">

                        <span>Subtotal</span>

                        <span>${{ $total }}</span>

                    </div>

                    <div class="summary-item">

                        <span>Shipping</span>

                        <span>${{ $total * 0.002 }}</span>

                    </div>

                    <div class="summary-item">

                        <span>Tax</span>

                        <span>${{ $total * 0.15 }}</span>

                    </div>

                    <div class="summary-item total">

                        <span>Total</span>

                        <span>${{ $total + $total * 0.15 }}</span>

                    </div>

                    <!-- Coupon -->

                    <div class="coupon">

                        <input type="text" placeholder="Coupon Code">

                        <button>
                            Apply Coupon
                        </button>

                    </div>

                    <!-- Checkout -->

                    <a href="{{ route('checkout') }}">
                        <button class="checkout-btn">

                            Proceed To Checkout

                        </button>
                    </a>

                </div>

            </div>
        @endif

    </section>
@endsection
