@extends('layout.admin')

@section('title', 'Edit Category')

@section('content')

<div class="page-header">

    <div>

        <h1>Edit Category</h1>

        <p>Update category information.</p>

    </div>

</div>

<form
    action="{{ route('category.update', $category) }}"
    method="POST"
    enctype="multipart/form-data"
    class="product-form"
>

    @csrf
    @method('PUT')

    @include('admin.categories.partials.form')

</form>

@endsection

@push('scripts')

<script>

const image = document.getElementById('image');

const preview = document.getElementById('preview');

image.addEventListener('change', function () {

    if (this.files && this.files[0]) {

        preview.src = URL.createObjectURL(this.files[0]);

    }

});

</script>

@endpush