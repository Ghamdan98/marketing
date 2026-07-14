@extends('layout.master')

@section('title', 'Order Details')

@section('content')

<section class="section">

    <div class="container">

        {{-- Header --}}

        <div class="section-header">

            <div>

                <h1 class="section-title">

                    Order #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}

                </h1>

                <p class="section-subtitle">

                    View all details about your order.

                </p>

            </div>

            @switch($order->status)

                @case('pending')

                    <span class="badge badge-warning">

                        Pending

                    </span>

                @break

                @case('completed')

                    <span class="badge badge-success">

                        Completed

                    </span>

                @break

                @case('cancelled')

                    <span class="badge badge-danger">

                        Cancelled

                    </span>

                @break

                @default

                    <span class="badge">

                        {{ ucfirst($order->status) }}

                    </span>

            @endswitch

        </div>

        {{-- Order Information --}}

        <div class="order-info-grid">

            <div class="card">

                <div class="card-body">

                    <h3 class="card-title">

                        Shipping Address

                    </h3>

                    <p>

                        <strong>City:</strong>

                        {{ $order->city }}

                    </p>

                    <p>

                        <strong>Address:</strong>

                        {{ $order->address_order }}

                    </p>

                    <p>

                        <strong>Phone:</strong>

                        {{ $order->phone }}

                    </p>

                </div>

            </div>

            <div class="card">

                <div class="card-body">

                    <h3 class="card-title">

                        Order Summary

                    </h3>

                    <p>

                        <strong>Date:</strong>

                        {{ $order->created_at->format('d M Y') }}

                    </p>

                    <p>

                        <strong>Items:</strong>

                        {{ $order->order_item->count() }}

                    </p>

                    <p>

                        <strong>Total:</strong>

                        ${{ number_format($order->total_price,2) }}

                    </p>

                </div>

            </div>

        </div>

        {{-- Products --}}

        <div class="card mt-5">

            <div class="card-body">

                <h2 class="card-title">

                    Ordered Products

                </h2>

                <div class="table-responsive">

                    <table class="table">

                        <thead>

                            <tr>

                                <th>Product</th>

                                <th>Name</th>

                                <th>Price</th>

                                <th>Qty</th>

                                <th>Total</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($order->order_item as $item)

                                <tr>

                                    <td width="90">

                                        <img
                                            src="{{ asset('storage/'.$item->product->image) }}"
                                            class="table-product-image"
                                            alt="{{ $item->product->name }}">

                                    </td>

                                    <td>

                                        {{ $item->product->name }}

                                    </td>

                                    <td>

                                        ${{ number_format($item->price,2) }}

                                    </td>

                                    <td>

                                        {{ $item->quantity }}

                                    </td>

                                    <td>

                                        <strong>

                                            ${{ number_format($item->price * $item->quantity,2) }}

                                        </strong>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection