<section class="dashboard-tables">

    <!-- ===========================
         Recent Orders
    ============================ -->

    <div class="dashboard-card orders-card">

        <div class="dashboard-card-header">

            <div>

                <h3>Recent Orders</h3>

                <p>Latest customer purchases</p>

            </div>

            <a href="#" class="btn btn-outline btn-sm">

                View All →

            </a>

        </div>

        <div class="dashboard-table">

            <table>

                <thead>

                    <tr>

                        <th>Order</th>

                        <th>Customer</th>

                        <th>Total</th>

                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($order_list as $order)

                        <tr>

                            <td>

                                <span class="order-id">

                                    #{{ $order->id }}

                                </span>

                            </td>

                            <td>

                                <div class="customer-box">

                                    <div class="customer-avatar">

                                        {{ strtoupper(substr($order->user->name,0,1)) }}

                                    </div>

                                    <div>

                                        <strong>

                                            {{ $order->user->name }}

                                        </strong>

                                        <small>

                                            Customer

                                        </small>

                                    </div>

                                </div>

                            </td>

                            <td>

                                <strong>

                                    ${{ number_format($order->total_price,2) }}

                                </strong>

                            </td>

                            <td>

                                @if($order->status=='completed')

                                    <span class="status success">

                                        ✔ Completed

                                    </span>

                                @elseif($order->status=='pending')

                                    <span class="status warning">

                                        ⏳ Pending

                                    </span>

                                @else

                                    <span class="status danger">

                                        ✖ Cancelled

                                    </span>

                                @endif

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>



    <!-- ===========================
         Top Products
    ============================ -->

    <div class="dashboard-card">

        <div class="dashboard-card-header">

            <div>

                <h3>Top Selling Products</h3>

                <p>Best performing products</p>

            </div>

        </div>

        <div class="top-products">

            @foreach($sele_product as $product)

                <div class="top-product">

                    <div class="product-icon">

                        {{ strtoupper(substr($product->name,0,1)) }}

                    </div>

                    <div class="product-info">

                        <h4>

                            {{ $product->name }}

                        </h4>

                        <span>

                            {{ $product->total_sold }} Sales

                        </span>

                    </div>

                    <div class="product-count">

                        {{ $product->total_sold }}

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>