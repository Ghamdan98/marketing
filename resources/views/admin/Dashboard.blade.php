@extends('layout.admin')
@section('content')
    <div class="topbar">

        <h1>Store Dashboard</h1>

        <div class="admin">
            Welcome, {{ Auth::user()->name }}
        </div>

    </div>

    <!-- Stats -->

    <div class="stats">

        <div class="card">

            <h3>Total Sales</h3>

            <div class="number">
                {{ $seles }}
            </div>

        </div>

        <div class="card">

            <h3>Total Orders</h3>

            <div class="number">
                {{ $orders }}
            </div>

        </div>

        <div class="card">

            <h3>Products</h3>

            <div class="number">
                {{ $products }}
            </div>

        </div>

        <div class="card">

            <h3>Customers</h3>

            <div class="number">
                {{ $users }}
            </div>

        </div>

    </div>

    <!-- Analytics -->

    <div class="analytics">

        <div class="chart">

            <h2>Sales Analytics</h2>

            <div class="chart-box"></div>

        </div>

        <div class="activity">

            <h2>Store Activity</h2>

            <br>

            <p>✔ New order received</p>
            <br>

            <p>✔ Product added successfully</p>
            <br>

            <p>✔ Customer registered</p>
            <br>

            <p>✔ Sales increased today</p>

        </div>

    </div>

    <!-- Best Products -->

    <div class="products">

        <h2>Top Selling Products</h2>

        <table>

            <tr>

                <th>Product</th>

                <th>Sales</th>

                <th>Revenue</th>

            </tr>

            <tr>
                @foreach ($sele_product as $sp)
                    <td>{{ $sp->name }}</td>
                    <td>${{ $sp->total_sold }}</td>
                    {{-- <td>{{ }}</td> --}}
            </tr>
            @endforeach

        </table>

    </div>

    <!-- Recent Orders -->

    <div class="orders">

        <h2>Recent Orders</h2>

        <table>

            <tr>

                <th>Order ID</th>

                <th>Customer</th>

                <th>Total</th>

                <th>Status</th>

            </tr>
            @foreach ($order_list as $order)
                <tr>

                    <td>#{{ $order->id }}</td>

                    <td>{{ $order->user->name }}</td>

                    <td>${{ $order->total_price }}</td>

                    <td>
                        <span class="status completed">
                            {{ $order->status }}
                        </span>
                    </td>

                </tr>
            @endforeach
        </table>

    </div>
@endsection
