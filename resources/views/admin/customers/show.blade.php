@extends('layout.admin')

@section('title','Customer Details')

@section('content')

<div class="page-header">

    <div class="page-title">

        <h1>Customer Details</h1>

        <p>View customer information and order history.</p>

    </div>

    <div class="page-actions">

        <a href="{{ route('customer_page_index') }}" class="btn-secondary">

            <i class="fa-solid fa-arrow-left"></i>

            Back

        </a>

    </div>

</div>

<!-- ==========================
     CUSTOMER HEADER
=========================== -->

<div class="customer-show">

    <div class="customer-profile-card">

        <div class="customer-avatar">

            {{ strtoupper(substr($customer->name,0,1)) }}

        </div>

        <h2>{{ $customer->name }}</h2>

        <p>{{ $customer->email }}</p>

    </div>

    <div class="customer-info-card">

        <div class="card-header">

            <h2>Customer Information</h2>

        </div>

        <div class="card-body">

            <table>

                <tr>

                    <th>Name</th>

                    <td>{{ $customer->name }}</td>

                </tr>

                <tr>

                    <th>Email</th>

                    <td>{{ $customer->email }}</td>

                </tr>

                <tr>

                    <th>Phone</th>

                    <td>{{ $customer->phone ?: 'Not Available' }}</td>

                </tr>

                <tr>

                    <th>Joined</th>

                    <td>{{ $customer->created_at->format('d M Y') }}</td>

                </tr>

            </table>

        </div>

    </div>

</div>

<!-- ==========================
     STATISTICS
=========================== -->

<div class="customer-stats">

    <div class="stat-card">

        <div class="stat-icon blue">

            <i class="fa-solid fa-bag-shopping"></i>

        </div>

        <div>

            <h3>{{ $customer->order->count() }}</h3>

            <span>Total Orders</span>

        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon green">

            <i class="fa-solid fa-dollar-sign"></i>

        </div>

        <div>

            <h3>${{ number_format($totalSpent,2) }}</h3>

            <span>Total Spent</span>

        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon orange">

            <i class="fa-solid fa-chart-line"></i>

        </div>

        <div>

            <h3>${{ number_format($averageOrder,2) }}</h3>

            <span>Average Order</span>

        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon purple">

            <i class="fa-solid fa-receipt"></i>

        </div>

        <div>

            <h3>

                @if($lastOrder)

                    #{{ $lastOrder->id }}

                @else

                    -

                @endif

            </h3>

            <span>Last Order</span>

        </div>

    </div>

</div>

<!-- ==========================
     ORDERS
=========================== -->

<div class="table-card">

    <div class="table-header">

        <div class="table-title">

            <h2>Customer Orders</h2>

            <p>{{ $customer->order->count() }} Orders</p>

        </div>

    </div>

    <div class="table-responsive">

        <table class="data-table">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Status</th>

                    <th>Total</th>

                    <th>Date</th>

                    <th width="120">Action</th>

                </tr>

            </thead>

            <tbody>

            @forelse($customer->order as $order)

                <tr>

                    <td>

                        #{{ $order->id }}

                    </td>

                    <td>

                        <span class="badge {{ $order->status }}">

                            {{ ucfirst($order->status) }}

                        </span>

                    </td>

                    <td>

                        ${{ number_format($order->total_price,2) }}

                    </td>

                    <td>

                        {{ $order->created_at->format('d M Y') }}

                    </td>

                    <td>

                        <div class="table-actions">

                            <a
                                href="{{ route('order.show',$order->id) }}"
                                class="action-btn view">

                                <i class="fa-solid fa-eye"></i>

                            </a>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5">

                        <div class="empty-table">

                            <i class="fa-solid fa-box-open"></i>

                            <h3>No Orders Found</h3>

                            <p>This customer has not placed any orders yet.</p>

                        </div>

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection