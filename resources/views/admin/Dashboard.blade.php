@extends('layout.admin')

@section('title', 'Dashboard')

@section('content')

    <!-- ==========================================
                                PAGE HEADER
                                ========================================== -->

    <div class="page-header">

        <div class="page-title">

            <h3>Dashboard</h3>

            <p>Welcome back! Here's what's happening in your store today.</p>

        </div>

    </div>

    <!-- ==========================================
                                STATISTICS
                                ========================================== -->

    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-icon blue">

                <i class="fa-solid fa-box"></i>

            </div>

            <div class="stat-content">

                <h3>{{ $totalProducts }}</h3>

                <span>Total Products</span>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon purple">

                <i class="fa-solid fa-layer-group"></i>

            </div>

            <div class="stat-content">

                <h3>{{ $totalCategories }}</h3>

                <span>Categories</span>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon green">

                <i class="fa-solid fa-users"></i>

            </div>

            <div class="stat-content">

                <h3>{{ $totalCustomers }}</h3>

                <span>Customers</span>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon orange">

                <i class="fa-solid fa-cart-shopping"></i>

            </div>

            <div class="stat-content">

                <h3>{{ $totalOrders }}</h3>

                <span>Total Orders</span>

            </div>

        </div>

    </div>

    <!-- ==========================================
                                SECOND ROW
                                ========================================== -->

    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-icon green">

                <i class="fa-solid fa-dollar-sign"></i>

            </div>

            <div class="stat-content">

                <h3>

                    ${{ number_format($totalRevenue, 2) }}

                </h3>

                <span>Total Revenue</span>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon yellow">

                <i class="fa-solid fa-clock"></i>

            </div>

            <div class="stat-content">

                <h3>{{ $pendingOrders }}</h3>

                <span>Pending Orders</span>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon blue">

                <i class="fa-solid fa-circle-check"></i>

            </div>

            <div class="stat-content">

                <h3>{{ $completedOrders }}</h3>

                <span>Completed Orders</span>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon red">

                <i class="fa-solid fa-ban"></i>

            </div>

            <div class="stat-content">

                <h3>{{ $cancelledOrders }}</h3>

                <span>Cancelled Orders</span>

            </div>

        </div>

    </div>

    <!-- ==========================================
                                CONTENT GRID
                                ========================================== -->

    <div class="dashboard-grid">
        <!-- ==========================================
                                SALES OVERVIEW
                                ========================================== -->

        <div class="info-card">

            <div class="card-header">

                <div>

                    <h2>Sales Overview</h2>

                    <p>Monthly revenue statistics</p>

                </div>

            </div>

            <div class="card-body">

                <div class="chart-container">

                    <canvas id="salesChart"></canvas>

                </div>

            </div>

        </div>

        <div class="table-card">

            <div class="table-header">

                <div class="table-title">

                    <h2>Orders Status</h2>

                    <p>Current order distribution</p>

                </div>

            </div>

            <div class="chart-container small-chart">

                <canvas id="statusChart"></canvas>

            </div>

        </div>
        <!-- ==========================================
                                RECENT ORDERS
                                ========================================== -->


        <div class="table-card">

            <div class="table-header">

                <div class="table-title">

                    <h2>Recent Orders</h2>

                    <p>Latest customer orders</p>

                </div>

                <a href="{{ route('customer_page_index') }}" class="btn-secondary">

                    View All

                </a>

            </div>

            <div class="table-responsive">

                <table class="data-table">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Customer</th>

                            <th>Status</th>

                            <th>Total</th>

                            <th>Date</th>

                            <th width="110">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($recentOrders as $order)
                            <tr>

                                <td>

                                    #{{ $order->id }}

                                </td>

                                <td>

                                    {{ $order->user->name }}

                                </td>

                                <td>

                                    @php

                                        $statusClass = match ($order->status) {
                                            'pending' => 'warning',

                                            'processing' => 'info',

                                            'completed' => 'success',

                                            'cancelled' => 'danger',

                                            default => 'secondary',
                                        };

                                    @endphp

                                    <span class="badge {{ $statusClass }}">

                                        {{ ucfirst($order->status) }}

                                    </span>

                                </td>

                                <td>

                                    ${{ number_format($order->total_price, 2) }}

                                </td>

                                <td>

                                    {{ $order->created_at->format('d M Y') }}

                                </td>

                                <td>

                                    <div class="table-actions">

                                        <a href="{{ route('order.show', $order) }}" class="action-btn view">

                                            <i class="fa-solid fa-eye"></i>

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6">

                                    <div class="empty-table">

                                        <i class="fa-solid fa-box-open"></i>

                                        <h3>No Orders Yet</h3>

                                        <p>Orders will appear here.</p>

                                    </div>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- ==========================================
                                BOTTOM GRID
                                ========================================== -->

        {{-- <div class="dashboard-grid"> --}}
            <!-- ==========================================
                                LATEST CUSTOMERS
                                ========================================== -->
            {{-- <div class="dashboard-bottom"> --}}
            <div class="table-card">

                <div class="table-header">

                    <div class="table-title">

                        <h2>Latest Customers</h2>

                        <p>Recently registered customers</p>

                    </div>

                    <a href="{{ route('customer_page_index') }}" class="btn-secondary">

                        View All

                    </a>

                </div>

                <div class="table-responsive">

                    <table class="data-table">

                        <thead>

                            <tr>

                                <th>Customer</th>

                                <th>Email</th>

                                <th>Joined</th>

                                <th width="110">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($latestCustomers as $customer)
                                <tr>

                                    <td>

                                        <div class="table-user">

                                            <div class="table-avatar">

                                                {{ strtoupper(substr($customer->name, 0, 1)) }}

                                            </div>

                                            <strong>

                                                {{ $customer->name }}

                                            </strong>

                                        </div>

                                    </td>

                                    <td>

                                        {{ $customer->email }}

                                    </td>

                                    <td>

                                        {{ $customer->created_at->format('d M Y') }}

                                    </td>

                                    <td>

                                        <div class="table-actions">

                                            <a href="{{ route('customer.show', $customer) }}" class="action-btn view">

                                                <i class="fa-solid fa-eye"></i>

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4">

                                        <div class="empty-table">

                                            <i class="fa-solid fa-users"></i>

                                            <h3>No Customers</h3>

                                            <p>No registered customers found.</p>

                                        </div>

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- ==========================================
                                TOP PRODUCTS
                                ========================================== -->

            <div class="table-card">

                <div class="table-header">

                    <div class="table-title">

                        <h2>Top Products</h2>

                        <p>Best selling products</p>

                    </div>

                    <a href="{{ route('products.index') }}" class="btn-secondary">

                        View All

                    </a>

                </div>

                <div class="table-responsive">

                    <table class="data-table">

                        <thead>

                            <tr>

                                <th>Product</th>

                                <th>Sales</th>

                                <th width="110">Action</th>

                            </tr>

                        </thead>
                        {{-- 
                            <tbody>

                                @forelse($topProducts as $product)
                                    <tr>

                                        <td>

                                            {{ $product->name }}

                                        </td>

                                        <td>

                                            <span class="badge success">

                                                {{ $product->order_items_count }}

                                            </span>

                                        </td>

                                        <td>

                                            <div class="table-actions">

                                                <a href="{{ route('product.show', $product) }}" class="action-btn view">

                                                    <i class="fa-solid fa-eye"></i>

                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="3">

                                            <div class="empty-table">

                                                <i class="fa-solid fa-box-open"></i>

                                                <h3>No Products</h3>

                                                <p>No sales data available.</p>

                                            </div>

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody> --}}

                    </table>

                </div>

            </div>
        </div>
        {{-- </div> --}}
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            window.chartLabels = @json($chartLabels);

            window.chartData = @json($chartData);
        </script>
        <script>
            window.statusChart = @json($statusChart);
        </script>
        <script src="{{ asset('js/dashboard-chart.js') }}"></script>

    @endsection
