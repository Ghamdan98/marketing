<!-- Navbar -->

<nav>
    <div class="logo">Ghamdan Store</div>

    <ul>
        @if (Auth::check() && Auth::user()->role == 'admin')
        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>    
        @endif
        <li><a href="#">Home</a></li>
        <li><a href="{{ route('shop.product') }}">All Products</a></li>
        <li><a href="{{ route('shop.category') }}">Categories</a></li>
        <li><a href="{{ route('contact_us') }}">Contact</a></li>
        <li><a href="{{ route('orders.index') }}">My Order</a></li>
        <li><a href="{{ route('orders.index') }}"></a></li>
        <li> <a href="{{ route('card.index') }}" class="cart-icon">🛒<span class="cart-count"></span></a></li>
        {{-- @auth
            <div class="d-flex align-items-center">
                <i class="fas fa-user-circle fs-4"></i>
                <span class="ms-2">{{ Auth::user()->name }}</span>
            </div>
        @endauth --}}
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="btn btn-danger" style="width: 125px" >
                    تسجيل الخروج
                </button>
            </form>
        @endauth
    </ul>
</nav>

<!-- Hero -->
