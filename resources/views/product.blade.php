@extends('layout.master')
@section('title', 'Products')
@section('content')
    <section class="header">

        <h1>Our Products</h1>
        <form action="{{ route('search') }}" method="get">
            <div class="search-box">

                <input type="text" name="search" placeholder="Search Products..." value="{{ request('search') }}">

                <button type="submit">Search</button>

            </div>
        </form>
    </section>  

    <!-- Categories -->

    <section class="categories">

        @foreach ($category as $c)
            <a href="{{ route('category.product', $c->id) }}"> <button>{{ $c->name }}</button></a>
        @endforeach
        <a href="{{ route('shop.product') }}"><button>All</button></a>

    </section>

    <!-- Products -->

    <section class="products">

        <div class="product-grid">

            <!-- Product 1 -->
            @if ($product->count())


                @foreach ($product as $p)
                    <div class="card">

                        <img src="{{ asset('storage/' . $p->image) }}" alt="">

                        <div class="card-body">

                            <h3>{{ $p->name }}</h3>

                            <p class="description">
                                {{ $p->description }}
                            </p>

                            <div class="price">${{ $p->sele_price }}</div>

                            <a href="{{ route('add_card', $p) }}" class="btn">
                                Add To Cart
                            </a>

                        </div>

                    </div>
                @endforeach
            @else
                <div class="no-products">

                    <img class="empty-img" src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png" alt="No Products">

                    <h2>No Products Found</h2>

                    <p>
                        Sorry, we couldn't find any products matching your search.
                    </p>

                    {{-- <a href="{{ route('product') }}"> --}}
                    Back To Shop
                    </a>

                </div>
            @endif
        </div>

    </section>
@endsection
