@extends('layout.master')

@section('content')

    <div class="orders-container">

        <h1 class="page-title">📦 My Orders</h1>

        @if ($orders->count())
            <table class="orders-table">

                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Details</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($orders as $order)
                        <tr>

                            <td>#{{ $order->id }}</td>

                            <td>${{ $order->total_price }}</td>

                            <td>
                                <span class="status">
                                    {{ $order->status }}
                                </span>
                            </td>

                            <td>
                                {{ $order->created_at->format('Y-m-d') }}
                            </td>

                            <td>
                                <a href="{{ route('order.details',$order->id) }}" class="view-btn">
                                    View Order
                                </a>
                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>
        @else
            <div class="empty-orders">

                <h2>No Orders Yet</h2>

                <p>You haven't placed any orders.</p>

                <a href="{{ route('shop.product') }}" class="shop-btn">
                    Start Shopping
                </a>

            </div>
        @endif

    </div>

@endsection
