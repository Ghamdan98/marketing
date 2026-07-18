<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice #{{ $order->id }}</title>

    <link rel="stylesheet" href="{{ asset('css/invoice.css') }}">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>

<div class="invoice">

    <!-- Header -->

    <div class="invoice-header">

        <div>

            <h1>GHAMDAN STORE</h1>

            <p>www.ghamdanstore.com</p>

            <p>Saudi Arabia</p>

        </div>

        <div class="invoice-info">

            <h2>INVOICE</h2>

            <p><strong>#{{ $order->id }}</strong></p>

            <p>{{ $order->created_at->format('d M Y') }}</p>

        </div>

    </div>

    <!-- Customer -->

    <div class="invoice-section">

        <h3>Customer Information</h3>

        <table>

            <tr>

                <td>Name</td>

                <td>{{ $order->user->name }}</td>

            </tr>

            <tr>

                <td>Email</td>

                <td>{{ $order->user->email }}</td>

            </tr>

            <tr>

                <td>Phone</td>

                <td>{{ $order->phone }}</td>

            </tr>

            <tr>

                <td>Address</td>

                <td>{{ $order->address }}</td>

            </tr>

        </table>

    </div>

    <!-- Products -->

    <div class="invoice-section">

        <h3>Products</h3>

        <table class="invoice-table">

            <thead>

            <tr>

                <th>Product</th>

                <th>Price</th>

                <th>Qty</th>

                <th>Total</th>

            </tr>

            </thead>

            <tbody>

            @foreach($order->order_item as $item)

                <tr>

                    <td>{{ $item->product->name }}</td>

                    <td>${{ number_format($item->price,2) }}</td>

                    <td>{{ $item->quantity }}</td>

                    <td>${{ number_format($item->price * $item->quantity,2) }}</td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

    <!-- Summary -->

    <div class="invoice-summary">

        <table>

            <tr>

                <td>Subtotal</td>

                <td>${{ number_format($order->total_price,2) }}</td>

            </tr>

            <tr>

                <td>Shipping</td>

                <td>$0.00</td>

            </tr>

            <tr>

                <td>Discount</td>

                <td>$0.00</td>

            </tr>

            <tr class="grand-total">

                <td>Grand Total</td>

                <td>${{ number_format($order->total_price,2) }}</td>

            </tr>

        </table>

    </div>

    <!-- Footer -->

    <div class="invoice-footer">

        <p>Thank you for shopping with us </p>

    </div>

    <!-- Buttons -->

    <div class="invoice-actions">

        <button onclick="window.print()" class="btn-print">

            <i class="fa-solid fa-print"></i>

            Print Invoice

        </button>

        <a href="{{ route('order.index') }}" class="btn-back">

            Back

        </a>

    </div>

</div>

</body>

</html>