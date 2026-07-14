@extends('layout.master')

@section('title', 'Home')

@section('content')

{{-- ===========================
    Hero Section
=========================== --}}

<section class="hero">

    <div class="container">

        <div class="hero-content">

            <span class="hero-badge">

                Welcome To Ghamdan Store

            </span>

            <h1>

                Modern E-Commerce Store

            </h1>

            <p>

                Discover high-quality products with the best prices,
                secure payment and fast delivery.

            </p>

            <div class="hero-actions">

                <a
                    href="{{ route('shop.product') }}"
                    class="btn btn-primary">

                    Shop Now

                </a>

                <a
                    href="{{ route('shop.category') }}"
                    class="btn btn-outline">

                    Browse Categories

                </a>

            </div>

        </div>

    </div>

</section>


{{-- ===========================
    Featured Products
=========================== --}}

<section class="section">

    <div class="container">

        <div class="section-header">

            <div>

                <h2 class="section-title">

                    Featured Products

                </h2>

                <p class="section-subtitle">

                    Explore our latest featured products.

                </p>

            </div>

            <a
                href="{{ route('shop.product') }}"
                class="section-link">

                View All →

            </a>

        </div>

        <div class="product-grid">

            @foreach($product as $prod)

                <div class="card product-card">

                    {{-- Badge --}}

                    <span class="badge badge-danger product-badge">

                        Sale

                    </span>

                    {{-- Wishlist --}}

                    <button
                        type="button"
                        class="wishlist-btn">

                        ❤

                    </button>

                    {{-- Product Image --}}

                    <div class="product-image-wrapper">

                        <img
                            src="{{ asset('storage/'.$prod->image) }}"
                            class="card-image"
                            alt="{{ $prod->name }}">

                    </div>

                    {{-- Product Body --}}

                    <div class="card-body">

                        <h3 class="card-title">

                            {{ Str::limit($prod->name,30) }}

                        </h3>

                        <div class="product-rating">

                            ★★★★★

                            <span>(24)</span>

                        </div>

                        <p class="card-text">

                            {{ Str::limit($prod->description,70) }}

                        </p>

                        <div class="card-price">

                            ${{ number_format($prod->price,2) }}

                        </div>

                        <div class="stock stock-success">

                            ✓ In Stock

                        </div>

                        <a
                            href="{{ route('add_card',$prod) }}"
                            class="btn btn-primary btn-block">

                            Add To Cart

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>


{{-- ===========================
    Why Choose Us
=========================== --}}

<section class="section">

    <div class="container">

        <div class="section-center">

            <h2 class="section-title">

                Why Choose Us

            </h2>

            <p class="section-subtitle">

                We always provide the best shopping experience.

            </p>

        </div>

        <div class="grid grid-4">

            <div class="card">

                <div class="card-body">

                    <h3>

                        🚚 Fast Delivery

                    </h3>

                    <p>

                        Fast shipping to your location.

                    </p>

                </div>

            </div>

            <div class="card">

                <div class="card-body">

                    <h3>

                        🔒 Secure Payment

                    </h3>

                    <p>

                        Safe and trusted payment methods.

                    </p>

                </div>

            </div>

            <div class="card">

                <div class="card-body">

                    <h3>

                        ⭐ Best Quality

                    </h3>

                    <p>

                        High quality guaranteed.

                    </p>

                </div>

            </div>

            <div class="card">

                <div class="card-body">

                    <h3>

                        💬 24/7 Support

                    </h3>

                    <p>

                        We are always here to help.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection