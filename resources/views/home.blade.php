@extends('layout.master')
@section('title', 'Home')
@section('content')
    <section class="hero">

        <div class="hero-content">
            <h1>Modern E-Commerce Store</h1>
            <p>Best Products With Best Prices</p>

            <a href="#" class="btn">Shop Now</a>
        </div>

    </section>

    <!-- Products -->

    <section class="products">

        <h2 class="section-title">Featured Products</h2>

        <div class="product-grid">

            @foreach ($product as $prod)
                <div class="card">
                    <img src="{{ asset('storage/'.$prod->image) }}" alt="">

                    <div class="card-body">
                        <h3>{{ $prod->name }}</h3>
                        <div class="price">${{ $prod->price }}</div>

                        <a href="{{ route('add_card', $prod) }}" class="btn">Buy Now</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
@endsection
