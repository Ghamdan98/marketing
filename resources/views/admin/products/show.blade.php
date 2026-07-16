@extends('layout.admin')

@section('title','Product Details')

@section('content')

<div class="page-header">

    <div>

        <h1 class="page-title">

            Product Details

        </h1>

        <p class="page-subtitle">

            View complete information about the product.

        </p>

    </div>

    <div class="page-actions">

        <a href="{{ route('products.index') }}"
           class="btn-cancel">

            <i class="fa-solid fa-arrow-left"></i>

            Back

        </a>

        <a href="{{ route('products.edit',$product) }}"
           class="btn-primary">

            <i class="fa-solid fa-pen"></i>

            Edit Product

        </a>

    </div>

</div>

<div class="product-show">

    <div class="product-image-card">

        <img src="{{ asset('storage/'.$product->image) }}">

    </div>

    <div class="product-info-card">

        <table>

            <tr>

                <th>Name</th>

                <td>{{ $product->name }}</td>

            </tr>

            <tr>

                <th>Slug</th>

                <td>{{ $product->slug }}</td>

            </tr>

            <tr>

                <th>Category</th>

                <td>{{ $product->category->name }}</td>

            </tr>

            <tr>

                <th>Price</th>

                <td>${{ number_format($product->price,2) }}</td>

            </tr>

            <tr>

                <th>Quantity</th>

                <td>{{ $product->quantity }}</td>

            </tr>

            <tr>

                <th>Status</th>

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

            </tr>

            <tr>

                <th>Created</th>

                <td>

                    {{ $product->created_at->format('d M Y') }}

                </td>

            </tr>

            <tr>

                <th>Updated</th>

                <td>

                    {{ $product->updated_at->format('d M Y') }}

                </td>

            </tr>

        </table>

    </div>

</div>

<div class="form-card">

    <div class="card-header">

        <h2>Description</h2>

    </div>

    <div class="card-body">

      <div class="description-content">

        {{ $product->description }}

    </div>

</div>

@endsection