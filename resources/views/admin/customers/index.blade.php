@extends('layout.admin')

@section('title', 'Customers')

@section('content')

<div class="page-header">

    <div class="page-title">

        <h1>Customers</h1>

        <p>Manage all registered customers.</p>

    </div>

    {{-- <div class="page-actions">

        <a href="{{ route('customer_page_index') }}" class="btn-secondary">

            <i class="fa-solid fa-rotate"></i>

            Refresh

        </a>

    </div>

</div> --}}

<div class="table-card">

    <div class="table-header">

        <div class="table-title">

            <h2>Customers List</h2>

            <p>{{ $customers->total() }} Customers Found</p>

        </div>

        <form method="GET">

            <div class="table-search">

                <i class="fa-solid fa-search"></i>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by name, email or phone..."
                >

            </div>

        </form>

    </div>

    <div class="table-responsive">

        <table class="data-table">

            <thead>

                <tr>

                    <th>Customer</th>

                    <th>Phone</th>

                    <th>Orders</th>

                    <th>Total Spent</th>

                    <th>Joined</th>

                    <th width="120">Actions</th>

                </tr>

            </thead>

            <tbody>

                @forelse($customers as $customer)

                    <tr>

                        <td>

                            <div class="table-user">

                                <div class="table-avatar">

                                    {{ strtoupper(substr($customer->name,0,1)) }}

                                </div>

                                <div class="table-user-info">

                                    <strong>{{ $customer->name }}</strong>

                                    <span>{{ $customer->email }}</span>

                                </div>

                            </div>

                        </td>

                        <td>

                            {{ $customer->phone ?: 'Not Available' }}

                        </td>

                        <td>

                            <span class="badge info">

                                {{ $customer->orders_count }}

                            </span>

                        </td>

                        <td>

                            ${{ number_format($customer->orders_sum_total_price ?? 0,2) }}

                        </td>

                        <td>

                            {{ $customer->created_at->format('d M Y') }}

                        </td>

                        <td>

                            <div class="table-actions">

                                <a
                                    href="{{ route('customer.show',$customer->id) }}"
                                    class="action-btn view"
                                    title="View Customer"
                                >

                                    <i class="fa-solid fa-eye"></i>

                                </a>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6">

                            <div class="empty-table">

                                <i class="fa-solid fa-users"></i>

                                <h3>No Customers Found</h3>

                                <p>No registered customers match your search.</p>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="pagination-wrapper">

        {{ $customers->links() }}

    </div>

</div>

@endsection