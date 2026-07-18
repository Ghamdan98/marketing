@extends('layout.admin')

@section('title', 'Order Details')

@section('content')

    <div class="page-header">

        <div>

            <h1>Order #{{ $order->id }}</h1>

            <p>View complete information about this order.</p>

        </div>

        <div class="page-actions">



            <a href="{{ route('order.invoice', $order) }}" class="btn-primary">

                <i class="fa-solid fa-file-invoice"></i>

                Invoice

            </a>

            <a href="{{ route('order.index') }}" class="btn-cancel">

                <i class="fa-solid fa-arrow-left"></i>

                Back

            </a>

        </div>

    </div>

    <div class="product-show">

        <div class="product-image-card">

            <div class="admin-avatar" style="width:120px;height:120px;font-size:40px;">

                {{ strtoupper(substr($order->user->name, 0, 1)) }}

            </div>

        </div>

        <div class="product-info-card">

            <table>

                <tr>

                    <th>Order Number</th>

                    <td>#{{ $order->id }}</td>

                </tr>

                <tr>

                    <th>Status</th>

                    <td>

                        <span class="badge info">

                            {{ ucfirst($order->status) }}

                        </span>

                    </td>

                </tr>

                <tr>

                    <th>Payment Method</th>

                    <td>{{ ucfirst($order->payment_method) }}</td>

                </tr>

                <tr>

                    <th>Total</th>

                    <td>${{ number_format($order->total_price, 2) }}</td>

                </tr>

                <tr>

                    <th>Date</th>

                    <td>{{ $order->created_at->format('d M Y - h:i A') }}</td>

                </tr>

            </table>

        </div>

    </div>

    <div class="form-card">

        <div class="card-header">

            <h2>Customer Information</h2>

        </div>

        <div class="card-body">

            <table class="data-table">

                <tbody>

                    <tr>

                        <th>Name</th>

                        <td>{{ $order->user->name }}</td>

                    </tr>

                    <tr>

                        <th>Email</th>

                        <td>{{ $order->user->email }}</td>

                    </tr>

                    <tr>

                        <th>Phone</th>

                        <td>{{ $order->phone }}</td>

                    </tr>

                    <tr>

                        <th>Address</th>

                        <td>{{ $order->address }}</td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

    <div class="table-card">

        <div class="table-header">

            <div class="table-title">

                <h2>Ordered Products</h2>

            </div>

        </div>

        <table class="data-table">

            <thead>

                <tr>

                    <th>Image</th>

                    <th>Product</th>

                    <th>Price</th>

                    <th>Qty</th>

                    <th>Total</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($order->order_item as $item)
                    <tr>

                        <td>

                            <img src="{{ asset('storage/' . $item->product->image) }}" class="table-image">

                        </td>

                        <td>{{ $item->product->name }}</td>

                        <td>${{ number_format($item->price, 2) }}</td>

                        <td>{{ $item->quantity }}</td>

                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

    <div class="form-card">

        <div class="card-header">

            <h2>Order Summary</h2>

        </div>

        <div class="card-body">

            <table class="data-table">

                <tbody>

                    <tr>

                        <th>Subtotal</th>

                        <td>${{ number_format($order->total_price, 2) }}</td>

                    </tr>

                    <tr>

                        <th>Shipping</th>

                        <td>$0.00</td>

                    </tr>

                    <tr>

                        <th>Discount</th>

                        <td>$0.00</td>

                    </tr>

                    <tr>

                        <th><strong>Grand Total</strong></th>

                        <td>

                            <strong>

                                ${{ number_format($order->total_price, 2) }}

                            </strong>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

@endsection
