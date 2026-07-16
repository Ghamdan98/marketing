@extends('layout.admin')

@section('title','Create Category')

@section('content')

<div class="page-header">

    <div>

        <h1>Create Category</h1>

        <p>Add a new category to your store.</p>

    </div>

</div>

<form
    action="{{ route('category.store') }}"
    method="POST"
    enctype="multipart/form-data"
    class="product-form"
>

    @csrf

    @include('admin.categories.partials.form')

</form>

@endsection

@push('scripts')

<script>

const image = document.getElementById('image');

const preview = document.getElementById('preview');

image.addEventListener('change', function(){

    if(this.files[0]){

        preview.src = URL.createObjectURL(this.files[0]);

    }

});

</script>

@endpush