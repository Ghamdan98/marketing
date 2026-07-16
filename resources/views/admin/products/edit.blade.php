@extends('layout.admin')

@section('title','Edit Product')

@section('content')

<div class="page-header">

    <div>

        <h1 class="page-title">Edit Product</h1>

        <p class="page-subtitle">

            Update product information.

        </p>

    </div>

</div>

@include('admin.products.partials.form',[
    'action'=>route('products.update',$product),
    'method'=>'PUT',
    'button'=>'Update Product'
])

@endsection