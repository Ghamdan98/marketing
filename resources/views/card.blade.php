@extends('layout.master')

@section('title', 'Shopping Cart')

@section('content')

<section class="section">

    <div class="container">

        {{-- Page Header --}}

        <div class="section-header">

            <div>

                <h1 class="section-title">

                    Shopping Cart

                </h1>

                <p class="section-subtitle">

                    Review your selected products before checkout.

                </p>

            </div>

        </div>


        @if($card && $card->card_item->count())

            <div class="cart-layout">

                {{-- Cart Items --}}

                <div class="cart-items">

                    @foreach($card->card_item as $item)

                        <div class="card cart-item">

                            <div class="cart-image">

                                <img
                                    src="{{ asset('storage/'.$item->product->image) }}"
                                    class="card-image"
                                    alt="{{ $item->product->name }}">

                            </div>

                            <div class="cart-content">

                                <h3>

                                    {{ $item->product->name }}

                                </h3>

                                <p class="card-price">

                                    ${{ number_format($item->product->sele_price,2) }}

                                </p>

                                <div class="quantity-box">

                                    <form action="{{ route('decrease_item',$item->id) }}" method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button class="btn btn-outline btn-sm">

                                            -

                                        </button>

                                    </form>

                                    <span>

                                        {{ $item->quantity }}

                                    </span>

                                    <form action="{{ route('increment_item',$item->id) }}" method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button class="btn btn-outline btn-sm">

                                            +

                                        </button>

                                    </form>

                                </div>

                            </div>

                            <div class="cart-actions">

                                <div class="item-total">

                                    ${{ number_format($item->quantity * $item->product->sele_price,2) }}

                                </div>

                                <form action="{{ route('delete_item',$item->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">

                                        Remove

                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- Summary --}}

                <div class="card summary-card">

                    <div class="card-body">

                        <h2>

                            Order Summary

                        </h2>

                        <div class="summary-row">

                            <span>Subtotal</span>

                            <span>${{ number_format($total,2) }}</span>

                        </div>

                        <div class="summary-row">

                            <span>Shipping</span>

                            <span>${{ number_format($total*0.002,2) }}</span>

                        </div>

                        <div class="summary-row">

                            <span>Tax</span>

                            <span>${{ number_format($total*0.15,2) }}</span>

                        </div>

                        <div class="summary-total">

                            <span>Total</span>

                            <span>

                                ${{ number_format($total+$total*0.15,2) }}

                            </span>

                        </div>

                        <input
                            type="text"
                            class="form-control"
                            placeholder="Coupon Code">

                        <button class="btn btn-outline btn-block">

                            Apply Coupon

                        </button>

                        <a
                            href="{{ route('checkout') }}"
                            class="btn btn-primary btn-block">

                            Proceed To Checkout

                        </a>

                    </div>

                </div>

            </div>

        @else

            <div class="empty-state">

                <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png" alt="">

                <h2>

                    Your Cart Is Empty

                </h2>

                <p>

                    Looks like you haven't added any products yet.

                </p>

                <a
                    href="{{ route('shop.product') }}"
                    class="btn btn-primary">

                    Continue Shopping

                </a>

            </div>

            
        @endif

    </div>

</section>

@endsection