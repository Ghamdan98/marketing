<header class="header">
    <div class="container">
        <nav class="navbar">
            <!-- Logo -->
            <a href="" class="logo">
                Ghamdan Store
            </a>
            <!-- Menu -->
            <ul class="nav-menu" id="nav-menu">
                @if (Auth::check() && Auth::user()->role == 'admin')
                    <li>
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            Dashboard
                        </a>
                    </li>
                @endif

                <li>
                    <a href="" class="nav-link">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('shop.product') }}" class="nav-link">
                        Products
                    </a>
                </li>
                <li>
                    <a href="{{ route('shop.category') }}" class="nav-link">
                        Categories
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact_us') }}" class="nav-link">
                        Contact
                    </a>
                </li>
                <li>
                    <a href="{{ route('customer_orders') }}" class="nav-link">
                        My Orders
                    </a>
                </li>
            </ul>
            <!-- Right Side -->
            <button class="menu-toggle" id="menu-toggle">

                ☰

            </button>
            <div class="nav-actions">
                <a href="{{ route('card.index') }}" class="cart-btn">
                    🛒
                    <span class="cart-count">
                        {{ Auth::check() ? Auth::user()->cart?->cartItems()->count() ?? 0 : 0 }}
                    </span>
                </a>
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                        Login
                    </a>
                @endauth
            </div>
        </nav>
    </div>
    
</header>
