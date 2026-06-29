@extends('layout.admin')

@section('title', 'Customers')

@section('content')

<div class="container">

    <div class="page-header">
        <h2>Customers</h2>

        <form action="{{ route('customer.index') }}" method="GET" class="search-box">

            <input
                type="text"
                name="search"
                placeholder="Search customer..."
                value="{{ request('search') }}">

            <button type="submit">Search</button>

        </form>
    </div>

    <table class="customers-table">

        <thead>

            <tr>

                <th>ID</th>

                <th>Name</th>

                <th>Email</th>

                <th>Orders</th>

                <th>Total Spent</th>

                <th>Joined</th>

                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            @forelse($customers as $customer)

            <tr>

                <td>#{{ $customer->id }}</td>

                <td>{{ $customer->name }}</td>

                <td>{{ $customer->email }}</td>

                <td>{{ $customer->order_count }}</td>

                <td>
                    ${{ number_format($customer->total_order_price ?? 0,2) }}
                </td>

                <td>
         {{ $customer->created_at ? $customer->created_at->format('d M Y') : '' }}
                    {{-- {{ $customer->created_at ? ->format('d M Y') : ''  }} --}}
                </td>

                <td>

                    <a
                        href="
                        {{ route('customer.show',$customer->id) }}
                         "
                        class="btn-view">

                        View

                    </a>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="7">

                    No Customers Found

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    <div class="pagination">

        {{-- {{ $customers->links() }} --}}

    </div>

</div>

@endsection