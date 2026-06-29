@extends('layout.admin')

@section('title','Customer Details')

@section('content')

<div class="customer-details">

    <div class="customer-card">

        <h2>Customer Details</h2>

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
                <td>{{ $customer->phone ?? '-' }}</td>
            </tr>

            <tr>
                <th>City</th>
                <td>{{ $customer->city ?? '-' }}</td>
            </tr>

            <tr>
                <th>Address</th>
                <td>{{ $customer->address ?? '-' }}</td>
            </tr>

            <tr>
                <th>Joined</th>
                <td>
                    {{-- {{ $customer->created_at->format('d M Y') }} --}}
                </td>
            </tr>

        </table>

    </div>

    <div class="summary">

        <h3>Orders Summary</h3>

        <p>
            Total Orders :
            <strong>{{ $customer->order->count() }}</strong>
        </p>

        <p>
            Total Spent :
            <strong>
                ${{ number_format($customer->order->sum('total_price'),2) }}
            </strong>
        </p>

        <p>

            Last Order :

            <strong>

            {{ optional($customer->order->sortByDesc('created_at')->first())->created_at?->format('d M Y') ?? '-' }}

            </strong>

        </p>

    </div>

    <div class="orders-list">

        <h3>Orders</h3>

        <table>

            <tr>

                <th>#</th>

                <th>Total</th>

                <th>Status</th>

                <th>Date</th>

            </tr>

            @forelse($customer->order as $order)

            <tr>

                <td>{{ $order->id }}</td>

                <td>${{ $order->total_price }}</td>

                <td>{{ ucfirst($order->status) }}</td>

                <td>{{ $order->created_at->format('d M Y') }}</td>

            </tr>

            @empty

            <tr>

                <td colspan="4">

                    No Orders

                </td>

            </tr>

            @endforelse

        </table>

    </div>

    <a href="{{ route('customer.index') }}" class="back-btn">

        Back

    </a>

</div>

@endsection