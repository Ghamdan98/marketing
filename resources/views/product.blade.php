@extends('layout.master')

@section('title', 'Products')

@section('content')

    <section class="section">

        <div class="container">

            <!-- Page Header -->

            <div class="products-header">

                <h1 class="section-title">
                    Our Products
                </h1>

                <form action="{{ route('search') }}" method="GET" class="search-form">

                    <input type="text" name="search" class="form-control" placeholder="Search products..."
                        value="{{ request('search') }}">

                    <button class="btn btn-primary" type="submit">

                        Search

                    </button>

                </form>
            </div>

            <!-- Categories -->

            <div class="categories">

                <a href="{{ route('shop.product') }}" class="btn btn-outline btn-sm">
                    All
                </a>

                @foreach ($category as $c)
                    <a href="{{ route('category.product', $c->id) }}" class="btn btn-outline btn-sm">

                        {{ $c->name }}

                    </a>
                @endforeach

            </div>

            <!-- Products -->

            @if ($product->count())

                <div class="grid grid-4">

                    @foreach ($product as $p)
                        <div class="card product-card">

                            {{-- Badge --}}
                            <span class="badge badge-danger product-badge">
                                Sale
                            </span>

                            {{-- Wishlist --}}
                            <button class="wishlist-btn" type="button">
                                ❤
                            </button>

                            {{-- Image --}}
                            <div class="product-image-wrapper">

                                <img src="{{ asset('storage/' . $p->image) }}" class="card-image" alt="{{ $p->name }}">

                            </div>

                            {{-- Body --}}
                            <div class="card-body">

                                <h3 class="card-title">

                                    {{ Str::limit($p->name, 30) }}

                                </h3>

                                <div class="product-rating">

                                    ★★★★★

                                    <span>(24)</span>

                                </div>

                                <p class="card-text">

                                    {{ Str::limit($p->description, 80) }}

                                </p>

                                <div class="card-price">

                                    ${{ number_format($p->sele_price, 2) }}

                                </div>

                                <div class="stock stock-success">

                                    ✓ In Stock

                                </div>

                                <a href="{{ route('add_card', $p) }}" class="btn btn-primary btn-block">

                                    Add To Cart

                                </a>

                            </div>

                        </div>
                    @endforeach

                </div>
            @else
                <div class="empty-state">

                    <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png" alt="No Products">

                    <h2>
                        No Products Found
                    </h2>

                    <p>
                        Sorry, we couldn't find any products matching your search.
                    </p>

                    <a href="{{ route('shop.product') }}" class="btn btn-primary">

                        Back To Shop

                    </a>

                </div>

            @endif

        </div>

    </section>

@endsection
