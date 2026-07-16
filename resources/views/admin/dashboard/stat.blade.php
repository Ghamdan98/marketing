<section class="stat-grid">

    <div class="stat-card">

        <div class="stat-icon stat-primary">

            💰

        </div>

        <div class="stat-content">

            <h4>Total Sales</h4>

            <h2>${{ number_format($seles,2) }}</h2>

            <span class="stat-text">

                Store Revenue

            </span>

        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon stat-success">

            📦

        </div>

        <div class="stat-content">

            <h4>Total Orders</h4>

            <h2>{{ $orders }}</h2>

            <span class="stat-text">

                Customer Orders

            </span>

        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon stat-warning">

            🛍

        </div>

        <div class="stat-content">

            <h4>Products</h4>

            <h2>{{ $products }}</h2>

            <span class="stat-text">

                Available Products

            </span>

        </div>

    </div>

    <div class="stat-card">

        <div class="stat-icon stat-danger">

            👥

        </div>

        <div class="stat-content">

            <h4>Customers</h4>

            <h2>{{ $users }}</h2>

            <span class="stat-text">

                Registered Users

            </span>

        </div>

    </div>

</section>