@extends('layout.admin')
@section('content')
<div class="product-container">

    <div class="product-header">

        <div>

            <h1>Add New Product</h1>

            <p>Create a new product for your store</p>

        </div>

    </div>

    <form action="{{ route('products.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="product-form">

        @csrf

        <div class="form-grid">

            <div class="form-group">

                <label>Product Name</label>

                <input type="text"
                       name="name"
                       placeholder="Enter product name">

            </div>

            <div class="form-group">

                <label>Slug</label>

                <input type="text"
                       name="slug"
                       placeholder="product-slug">

            </div>

            <div class="form-group">

                <label>Price</label>

                <input type="number"
                       name="price"
                       placeholder="0.00">

            </div>

            <div class="form-group">

                <label>sele price</label>

                <input type="number"
                       name="sele_price"
                       placeholder="0.00">

            </div>

            <div class="form-group">

                <label>Quantity</label>

                <input type="number"
                       name="quantity"
                       placeholder="0">

            </div>

            <div class="form-group">

                <label>Category</label>

                <select name="category_id">

                    <option value="">
                        Select Category
                    </option>

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}">

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">

                <label>Product Image</label>

                <input type="file"
                       name="image">

            </div>

        </div>

        <div class="form-group">

            <label>Description</label>

            <textarea name="description"
                      placeholder="Enter product description"></textarea>

        </div>

        <div class="form-buttons">

            <a href=""
               class="cancel-btn">

                Cancel

            </a>

            <button type="submit"
                    class="save-btn">

                Save Product

            </button>

        </div>

    </form>

</div>
@endsection