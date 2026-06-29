@extends('layout.admin')

@section('content')
    <div class="product-form-container">

        <h1>Edit Product</h1>

        <form action="{{ route('products.update',$product->id) }}" 
               method="POST" 
               enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- NAME -->

            <div class="form-group">

                <label>Product Name</label>

                <input type="text" name="name" value="{{ $product->name }}">

            </div>

            <!-- PRICE -->

            <div class="form-group">

                <label>Price</label>

                <input type="number" name="price" value="{{ $product->price }}">

            </div>

            <div class="form-group">

                <label>Seles Price</label>

                <input type="number" name="sele_price" value="{{ $product->sele_price }}">

            </div>
            <div class="form-group">

                <label>Quantity</label>

                <input type="number" name="quantity" value="{{ $product->quantity }}">

            </div>


            <!-- CATEGORY -->

            <div class="form-group">

                <label>Category</label>

                <select name="category_id">

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>
                    @endforeach

                </select>

            </div>

            <!-- DESCRIPTION -->

            <div class="form-group">

                <label>Description</label>

                <textarea name="description">{{ $product->description }}</textarea>

            </div>

            <!-- CURRENT IMAGE -->

            <div class="form-group">

                <label>Current Image</label>

                <br>

                <img src="{{ asset('storage/' . $product->image) }}"
                    style="width: 150px;
                            height: 150px;
                            object-fit: cover;
                            border-radius: 10px;"
                    class="product-image">

            </div>

            <!-- NEW IMAGE -->

            <div class="form-group">

                <label>New Image</label>

                <input type="file" name="image" value="{{ $product->image }}">

            </div>

            <button type="submit" class="save-btn">

                Update Product

            </button>

        </form>

    </div>
@endsection
