@extends('layout.admin')

@section('title','Products')

@section('content')

<div class="page-header">

    <div>

        <h1 class="page-title">Products</h1>

        <p class="page-subtitle">
            Manage all products in your store.
        </p>

    </div>

    <a href="{{ route('products.create') }}" class="btn-primary">

        <i class="fa-solid fa-plus"></i>

        Add Product

    </a>

</div>

<!-- Filter Bar -->

<div class="filter-card">

    <form method="GET" class="filter-form">

        <div class="search-box">

            <i class="fa-solid fa-magnifying-glass"></i>

            <input
                type="text"
                name="search"
                placeholder="Search products..."
                value="{{ request('search') }}">

        </div>

        <select name="category">

            <option value="">All Categories</option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    @selected(request('category')==$category->id)>

                    {{ $category->name }}

                </option>

            @endforeach

        </select>

        <select name="status">

            <option value="">All Status</option>

            <option value="1">Active</option>

            <option value="0">Inactive</option>

        </select>

        <button class="btn-secondary">

            Filter

        </button>

    </form>

</div>

<!-- Products Table -->

<div class="table-card">

    @if($products->count())

    <table class="data-table">

        <thead>

            <tr>

                <th>Image</th>

                <th>Product</th>

                <th>Category</th>

                <th>Price</th>

                <th>Stock</th>

                <th>Status</th>

                <th>Created</th>

                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

            @foreach($products as $product)

            <tr>

                <td>

                    <img
                        src="{{ asset('storage/'.$product->image) }}"
                        class="product-thumb">

                </td>

                <td>

                    <div class="product-name">

                        {{ $product->name }}

                    </div>

                    <div class="product-slug">

                        {{ $product->slug }}

                    </div>

                </td>

                <td>

                    {{ $product->category->name }}

                </td>

                <td>

                    ${{ number_format($product->price,2) }}

                </td>

                <td>

                    {{ $product->stock }}

                </td>

                <td>

                    @if($product->status)

                        <span class="badge success">

                            Active

                        </span>

                    @else

                        <span class="badge danger">

                            Inactive

                        </span>

                    @endif

                </td>

                <td>

                    {{ $product->created_at->format('d M Y') }}

                </td>

                <td>

                    <div class="table-actions">
                        <a href="{{ route('products.show',$product) }}"
                         class="action-btn view">

                          <i class="fa-solid fa-eye"></i>

                        </a>

                        <a href="{{ route('products.edit',$product) }}"
                           class="action-btn edit">

                            <i class="fa-solid fa-pen"></i>

                        </a>

                        <form
                            action="{{ route('products.destroy',$product) }}"
                            method="POST">

                            @csrf

                            @method('DELETE')

                            <button class="action-btn delete">

                                <i class="fa-solid fa-trash"></i>

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <div class="pagination-wrapper">

        {{-- {{ $products->links() }} --}}

    </div>

    @else

    <div class="empty-state">

        <i class="fa-solid fa-box-open"></i>

        <h3>No Products Found</h3>

        <p>

            Start by adding your first product.

        </p>

        <a
            href="{{ route('products.create') }}"
            class="btn-primary">

            Add Product

        </a>

    </div>

    @endif

</div>

@endsection