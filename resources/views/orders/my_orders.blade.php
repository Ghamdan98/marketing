@extends('layout.master')

@section('title', 'My Orders')

@section('content')

<section class="section">

    <div class="container">

        {{-- Header --}}

        <div class="section-header">

            <div>

                <h1 class="section-title">

                    My Orders

                </h1>

                <p class="section-subtitle">

                    Track and manage all your previous orders.

                </p>

            </div>

        </div>

        @if($orders->count())

            <div class="card">

                <div class="table-responsive">

                    <table class="table">

                        <thead>

                            <tr>

                                <th>Order #</th>

                                <th>Total</th>

                                <th>Status</th>

                                <th>Date</th>

                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($orders as $order)

                                <tr>

                                    <td>

                                        #{{ $order->id }}

                                    </td>

                                    <td>

                                        ${{ number_format($order->total_price,2) }}

                                    </td>

                                    <td>

                                        @switch($order->status)

                                            @case('pending')

                                                <span class="badge badge-warning">

                                                    Pending

                                                </span>

                                                @break

                                            @case('completed')

                                                <span class="badge badge-success">

                                                    Completed

                                                </span>

                                                @break

                                            @case('cancelled')

                                                <span class="badge badge-danger">

                                                    Cancelled

                                                </span>

                                                @break

                                            @default

                                                <span class="badge">

                                                    {{ ucfirst($order->status) }}

                                                </span>

                                        @endswitch

                                    </td>

                                    <td>

                                        {{ $order->created_at->format('d M Y') }}

                                    </td>

                                    <td>

                                        <a
                                            href="{{ route('order.details',$order->id) }}"
                                            class="btn btn-primary btn-sm">

                                            View

                                        </a>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        @else

            <div class="empty-state">

                <img
                    src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png"
                    alt="No Orders">

                <h2>

                    No Orders Yet

                </h2>

                <p>

                    You haven't placed any orders yet.

                </p>

                <a
                    href="{{ route('shop.product') }}"
                    class="btn btn-primary">

                    Start Shopping

                </a>

            </div>

        @endif

    </div>

</section>

@endsection