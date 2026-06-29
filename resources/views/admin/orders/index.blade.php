@extends('layout.admin')

@section('title', 'Orders')

@section('content')

    <div class="orders-page">

        <div class="page-header">
            <h2>Orders Management</h2>

            <form method="GET">

                <input type="text" name="search" placeholder="Search customer...">

                <select name="status">

                    <option value="">All Status</option>

                    <option value="pending">Pending</option>

                    <option value="processing">Processing</option>

                    <option value="shipped">Shipped</option>

                    <option value="delivered">Delivered</option>

                    <option value="cancelled">Cancelled</option>

                </select>

                <button>Search</button>

            </form>

        </div>

        <table class="orders-table">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Customer</th>

                    <th>Total</th>

                    <th>Status</th>

                    <th>Date</th>

                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($orders as $order)
                    <tr>

                        <td>#{{ $order->id }}</td>

                        <td>{{ $order->user->name }}</td>

                        <td>${{ $order->total_price }}</td>

                        <td>

                            <span class="status {{ $order->status }}">
                                {{ $order->status }}
                            </span>

                        </td>

                        <td>{{ $order->created_at->format('Y-m-d') }}</td>

                        <td>

                            <a href="" class="view-btn">

                                View

                            </a>

                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

        {{-- {{ $orders->links() }} --}}

    </div>

@endsection
