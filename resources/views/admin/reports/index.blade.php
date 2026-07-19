@extends('layout.admin')

@section('title', 'Reports')

@section('content')

    <div class="page-header">

        <div>

            <h1>Reports</h1>

            <p>Analyze your store performance and generate business reports.</p>

        </div>

    </div>

    <!-- ==========================================
                                            REPORT FILTERS
                                        ========================================== -->

    <div class="table-card">

        <div class="table-header">

            <div class="table-title">

                <h2>Report Filters</h2>

                <p>Select a period to generate statistics.</p>

            </div>

        </div>

        <form class="report-filter-form" method="GET">

            <div class="report-filters">

                <div class="form-group">

                    <label>From</label>

                    <input type="date" name="from" value="{{ request('from') }}">

                </div>

                <div class="form-group">

                    <label>To</label>

                    <input type="date" name="to" value="{{ request('to') }}">

                </div>

                <div class="form-group">

                    <label>Status</label>

                    <select name="status">

                        <option value="">All Orders</option>

                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                    </select>

                </div>

                <div class="form-group report-action">

                    <div class="report-actions">

                        <button type="submit" class="btn-primary">
                            <i class="fa-solid fa-chart-column"></i>
                            Generate Report
                        </button>

                        <a href="{{ route('reports.export.excel', request()->query()) }}" class="btn-success">

                            <i class="fa-solid fa-file-excel"></i>
                            Export Excel

                        </a>

                        <a href="#" class="btn-danger">

                            <i class="fa-solid fa-file-pdf"></i>
                            Export PDF

                        </a>

                    </div>
                </div>

            </div>

        </form>

    </div>

    <!-- ==========================================
                                            REPORT SUMMARY
                                        ========================================== -->

    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-icon revenue">

                <i class="fa-solid fa-dollar-sign"></i>

            </div>

            <div class="stat-content">

                <h3>${{ number_format($totalRevenue, 2) }}</h3>
                <p>Total Revenue</p>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon orders">

                <i class="fa-solid fa-cart-shopping"></i>

            </div>

            <div class="stat-content">

                <h3>{{ $totalOrders }}</h3>

                <p>Total Orders</p>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon customers">

                <i class="fa-solid fa-users"></i>

            </div>

            <div class="stat-content">

                <h3>{{ $totalCustomers }}</h3>

                <p>Customers</p>

            </div>

        </div>

        <div class="stat-card">

            <div class="stat-icon products">

                <i class="fa-solid fa-box"></i>

            </div>

            <div class="stat-content">

                <h3>{{ $productsSold }}</h3>

                <p>Products Sold</p>

            </div>

        </div>

    </div>

    <!-- ==========================================
                                            CHART PLACEHOLDER
                                        ========================================== -->

    <div class="table-card report-chart">

        <div class="table-header">

            <div class="table-title">

                <h2>Sales Report</h2>

                <p>Revenue during the selected period.</p>

            </div>

        </div>

        <div class="chart-container">

            <canvas id="salesReportChart"></canvas>

        </div>

    </div>
    <div class="report-bottom">

        <!-- ==========================================
                         TOP PRODUCTS
                    ========================================== -->

        <div class="table-card">

            <div class="table-header">

                <div class="table-title">

                    <h2>Top Selling Products</h2>

                    <p>Best products during selected period.</p>

                </div>

            </div>

            <div class="table-responsive">

                <table class="data-table">

                    <thead>

                        <tr>

                            <th>Product</th>

                            <th>Sold</th>

                            <th>Revenue</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($topProducts as $product)
                            <tr>

                                <td>{{ $product->name }}</td>

                                <td>

                                    <span class="badge success">

                                        {{ $product->total_sales }}

                                    </span>

                                </td>

                                <td>

                                    ${{ number_format($product->total_revenue, 2) }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="3">

                                    <div class="empty-table">

                                        <i class="fa-solid fa-box-open"></i>

                                        <h3>No Products</h3>

                                        <p>No products found.</p>

                                    </div>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>



        <!-- ==========================================
                         TOP CUSTOMERS
                    ========================================== -->

        <div class="table-card">

            <div class="table-header">

                <div class="table-title">

                    <h2>Top Customers</h2>

                    <p>Highest spending customers.</p>

                </div>

            </div>

            <div class="table-responsive">

                <table class="data-table">

                    <thead>

                        <tr>

                            <th>Customer</th>

                            <th>Orders</th>

                            <th>Spent</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($topCustomers as $customer)
                            <tr>

                                <td>

                                    <div class="table-user">

                                        <div class="table-avatar">

                                            {{ strtoupper(substr($customer->name, 0, 1)) }}

                                        </div>

                                        <div>

                                            <strong>{{ $customer->name }}</strong>

                                            <small>{{ $customer->email }}</small>

                                        </div>

                                    </div>

                                </td>

                                <td>

                                    <span class="badge info">

                                        {{ $customer->total_orders }}

                                    </span>

                                </td>

                                <td>

                                    ${{ number_format($customer->total_spent, 2) }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="3">

                                    <div class="empty-table">

                                        <i class="fa-solid fa-users"></i>

                                        <h3>No Customers</h3>

                                        <p>No customer data available.</p>

                                    </div>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        window.reportChart = {

            labels: @json($chartLabels),

            data: @json($chartData)

        };
    </script>
    @if (request()->routeIs('reports.*'))
        <script src="{{ asset('js/reports.js') }}"></script>
    @endif
@endsection
