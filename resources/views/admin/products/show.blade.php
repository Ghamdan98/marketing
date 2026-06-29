@extends('layout.admin')
@section('content')
    <div class="product-details">

        <div class="product-card">

            <div class="product-image-section">

                <img src="{{ asset('storage/' . $product->image) }}" class="main-image">

            </div>

            <div class="product-info">

                <span class="category">

                    {{ $product->category?->name }}

                </span>

                <h1>{{ $product->name }}</h1>

                <p class="price">

                    ${{ $product->price }}

                </p>

                <p class="description">

                    {{ $product->description }}

                </p>

                <div class="info-list">

                    <div class="info-item">

                        <strong>Quantity:</strong>

                        {{ $product->quantity }}

                    </div>

                    <div class="info-item">

                        <strong>Created At:</strong>

                        {{ $product->created_at->format('Y-m-d') }}

                    </div>

                </div>

                <div class="buttons">

                    <a href="{{ route('products.edit', $product->id) }}" class="edit-btn">

                        Edit Product

                    </a>

                    <a href="{{ route('products.index') }}" class="back-btn">

                        Back

                    </a>

                </div>

            </div>

        </div>

    </div>
@endsection
