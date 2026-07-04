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

            <h3>Monthly Sales</h3>

            <canvas id="salesChart"></canvas>

        </div>

        <div class="chart">

            <h2>Top Selling Products</h2>

            {{-- <div class="chart-box"> --}}
            <canvas id="productsChart"></canvas>
            {{-- </div> --}}

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @stack('scripts')
    
    <script>
        /* chart seles total Monthly */
        const months = @json($sales_chart->pluck('month'));

        const totals = @json($sales_chart->pluck('total_sales'));

        new Chart(document.getElementById('salesChart'), {

            type: 'line',

            data: {

                labels: months,

                datasets: [{

                    label: 'Monthly Sales',

                    data: totals,

                    borderWidth: 3,

                    tension: .4,

                    fill: false

                }]

            }

        });

        /* chart product seles */
        const productNames = @json($sele_product->pluck('name'));
        const quantities = @json($sele_product->pluck('total_sold'));
        new Chart(document.getElementById('productsChart'), {

            type: 'bar',

            data: {

                labels: productNames,

                datasets: [{
                    label: 'Sold',
                    data: quantities,
                    borderWidth: 1,
                    backgroundColor: '#3B82F6', // لون الأعمدة
                    borderColor: '#1D4ED8',
                }]

            }

        });
    </script>
    
@endsection
