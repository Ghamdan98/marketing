@extends('layout.master')

@section('title', 'Order Details')

@section('content')

    <div class="order-page">

        <div class="order-header">

            <h1>Order #{{ $order->id }}</h1>

            <span class="status">
                {{ $order->status }}
            </span>

        </div>

        <div class="order-info">

            <div class="info-card">
                <h3>Shipping Address</h3>

                <p>{{ $order->city }}</p>

                <p>{{ $order->address_order }}</p>

                <p>{{ $order->phone }}</p>
            </div>

            <div class="info-card">
                <h3>Order Information</h3>

                <p>Date:
                    {{ $order->created_at->format('Y-m-d') }}
                </p>

                <p>Total:
                    ${{ $order->total_price }}
                </p>
            </div>

        </div>

        <div class="products-card">

            <h2>Products</h2>

            @foreach ($order->order_item as $item)
                <div class="product-row">

                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="">

                    <div>

                        <h3>
                            {{ $item->product->name }}
                        </h3>

                        <p>
                            Quantity:
                            {{ $item->quantity }}
                        </p>

                        <p>
                            Price:
                            ${{ $item->price }}
                        </p>

                    </div>

                </div>
            @endforeach

        </div>

    </div>

@endsection
