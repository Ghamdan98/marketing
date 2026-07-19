<aside class="sidebar">

    <!-- Logo -->

    <div class="sidebar-logo">

        <a href="{{ route('dashboard') }}">

            <div class="logo-icon">

                <i class="fa-solid fa-store"></i>

            </div>

            <div class="logo-text">

                <h3>Admin Panel</h3>

                <span>Ghamdan Store</span>

            </div>

        </a>

    </div>

    <!-- Navigation -->

    <nav class="sidebar-nav">

        <ul>

            <li>

                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

                    <i class="fa-solid fa-gauge-high"></i>

                    <span>Dashboard</span>

                </a>

            </li>

            <li>

                <a href="{{ route('products.index') }}"
                   class="{{ request()->routeIs('products.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-box"></i>

                    <span>Products</span>

                </a>

            </li>

            <li>

                <a href="{{ route('category.index') }}"
                   class="{{ request()->routeIs('category.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-layer-group"></i>

                    <span>Categories</span>

                </a>

            </li>

            <li>

                <a href="{{ route('order.index') }}"
                   class="{{ request()->routeIs('order.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-bag-shopping"></i>

                    <span>Orders</span>

                </a>

            </li>

            <li>

                <a href="{{ route('customer_page_index') }}"
                   class="{{ request()->routeIs('customer.*') ? 'active' : '' }}">

                    <i class="fa-solid fa-users"></i>

                    <span>Customers</span>

                </a>

            </li>

            <li>

                <a href="{{ route('reports.index') }}">

                    <i class="fa-solid fa-chart-line"></i>

                    <span>Reports</span>

                </a>

            </li>

            <li>

                <a href="{{route('settings.index')}}">

                    <i class="fa-solid fa-gear"></i>

                    <span>Settings</span>

                </a>

            </li>

        </ul>

    </nav>

    <!-- Footer -->

    <div class="sidebar-footer">

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit">

                <i class="fa-solid fa-right-from-bracket"></i>

                <span>Logout</span>

            </button>

        </form>

    </div>

</aside>