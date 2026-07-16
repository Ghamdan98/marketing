@extends('layout.admin')

@section('title','Category Details')

@section('content')

<div class="page-header">

    <div>

        <h1>Category Details</h1>

        <p>View complete information about this category.</p>

    </div>

    <div class="page-actions">

        <a href="{{ route('category.edit',$category) }}" class="btn-primary">

            <i class="fa-solid fa-pen"></i>

            Edit

        </a>

        <a href="{{ route('category.index') }}" class="btn-cancel">

            <i class="fa-solid fa-arrow-left"></i>

            Back

        </a>

    </div>

</div>

<div class="product-show">

    <!-- Image -->

    <div class="product-image-card">

        <img
            src="{{ asset('storage/'.$category->image) }}"
            alt="{{ $category->name }}"
        >

    </div>

    <!-- Details -->

    <div class="product-info-card">

        <table>

            <tr>

                <th>Name</th>

                <td>{{ $category->name }}</td>

            </tr>

            <tr>

                <th>Slug</th>

                <td>{{ $category->slug }}</td>

            </tr>

            <tr>

                <th>Total Products</th>

                <td>

                    <span class="badge info">

                        {{ $category->product_count }}

                    </span>

                </td>

            </tr>

            <tr>

                <th>Created At</th>

                <td>{{ $category->created_at->format('d M Y - h:i A') }}</td>

            </tr>

            <tr>

                <th>Last Updated</th>

                <td>{{ $category->updated_at->format('d M Y - h:i A') }}</td>

            </tr>

        </table>

    </div>

</div>

@if($category->product_count)

<div class="table-card">

    <div class="table-header">

        <div class="table-title">

            <h2>Products in this Category</h2>

            <p>{{ $category->product_count }} Products</p>

        </div>

    </div>

    <table class="data-table">

        <thead>

            <tr>

                <th>Image</th>

                <th>Name</th>

                <th>Price</th>

                <th>Stock</th>

            </tr>

        </thead>

        <tbody>

        @foreach($category->product as $product)

            <tr>

                <td>

                    <img
                        src="{{ asset('storage/'.$product->image) }}"
                        class="table-image"
                        alt=""
                    >

                </td>

                <td>{{ $product->name }}</td>

                <td>${{ number_format($product->price,2) }}</td>

                <td>{{ $product->stock }}</td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endif

@endsection