@extends('layout.admin')

@section('title','Create Product')

@section('content')

<div class="page-header">

    <div>

        <h1 class="page-title">Create Product</h1>

        <p class="page-subtitle">

            Add a new product.

        </p>

    </div>

</div>

@include('admin.products.partials.form',[
    'action'=>route('products.store'),
    'method'=>'POST',
    'button'=>'Save Product'
])

@endsection