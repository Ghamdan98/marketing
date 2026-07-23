@extends('layout.admin')

@section('title','Orders')

@section('content')


<div class="page-header">

    <div>

        <h1>Orders</h1>

        <p>Manage customer orders.</p>

    </div>

</div>

<div class="table-card">

    <div class="table-header">

        <div class="table-title">

            <h2>Orders List</h2>

            {{-- <p>{{ $orders->total() }} Orders Found</p> --}}

        </div>

        <form method="GET">

            <div class="table-search">

                <i class="fa-solid fa-search"></i>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search order..."
                >

            </div>

        </form>

    </div>

    <table class="data-table">

        <thead>

            <tr>

                <th>Order #</th>

                <th>Customer</th>

                <th>Total</th>

                <th>Payment</th>

                <th>Status</th>

                <th>Date</th>

                <th width="180">Actions</th>

            </tr>

        </thead>

        <tbody>

        @forelse($orders as $order)

            <tr>

                <td>

                    <strong>#{{ $order->id }}</strong>

                </td>

                <td>

                    {{ $order->user->name }}

                </td>

                <td>

                    ${{ number_format($order->total_price,2) }}

                </td>

                <td>

                    <span class="badge success">

                        {{ ucfirst($order->payment_method) }}

                    </span>

                </td>

                <td>

                    @switch($order->status)

                        @case('pending')

                            <span class="badge warning">Pending</span>

                            @break

                        @case('confirmed')

                            <span class="badge info">Confirmed</span>

                            @break

                        @case('processing')

                            <span class="badge info">Processing</span>

                            @break

                        @case('shipped')

                            <span class="badge success">Shipped</span>

                            @break

                        @case('delivered')

                            <span class="badge success">Delivered</span>

                            @break

                        @case('cancelled')

                            <span class="badge danger">Cancelled</span>

                            @break

                    @endswitch

                </td>

                <td>

                    {{ $order->created_at->format('d M Y') }}

                </td>

                <td>

                    <div class="table-actions">

                        <a
                            href="{{ route('order.show',$order) }}"
                            class="action-btn view"
                        >
                            <i class="fa-solid fa-eye"></i>
                        </a>

                        <a
                            href="{{ route('order.invoice',$order) }}"
                            class="action-btn edit"
                        >
                            <i class="fa-solid fa-file-invoice"></i>
                        </a>

                        {{-- <a
                            href="{{ route('order.print',$order) }}"
                            class="action-btn"
                            style="background:#EDE9FE;color:#7C3AED;"
                        >
                            <i class="fa-solid fa-print"></i>
                        </a> --}}

                    </div>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="7">

                    <div class="empty-table">

                        <i class="fa-solid fa-bag-shopping"></i>

                        <h3>No Orders Found</h3>

                        <p>Customer orders will appear here.</p>

                    </div>

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

    <div class="pagination-wrapper">

        {{-- {{ $orders->links() }} --}}

    </div>

</div>

@endsection