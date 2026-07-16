<form action="{{ $action }}"
      method="POST"
      enctype="multipart/form-data"
      class="product-form">

    @csrf

    @if($method == 'PUT')
        @method('PUT')
    @endif

    <!-- ============================= -->
    <!-- General Information -->
    <!-- ============================= -->

    <div class="form-card">

        <div class="card-header">

            <h2>General Information</h2>

            <p>Basic information about the product.</p>

        </div>

        <div class="card-body">

            <div class="form-group">

                <label>Product Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name',$product->name ?? '') }}"
                    placeholder="Product name">

                @error('name')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>

            <div class="form-group">

                <label>Slug</label>

                <input
                    type="text"
                    id="slug"
                    name="slug"
                    value="{{ old('slug',$product->slug ?? '') }}"
                    placeholder="product-slug">

                @error('slug')
                    <small class="error">{{ $message }}</small>
                @enderror

            </div>

            <div class="form-group">

                <label>Description</label>

                <textarea
                    rows="6"
                    name="description">{{ old('description',$product->description ?? '') }}</textarea>

            </div>

        </div>

    </div>

    <!-- ============================= -->
    <!-- Price -->
    <!-- ============================= -->

    <div class="form-card">

        <div class="card-header">

            <h2>Pricing & Inventory</h2>

        </div>

        <div class="card-body two-columns">

            <div class="form-group">

                <label>Price</label>

                <input
                    type="number"
                    step="0.01"
                    name="price"
                    value="{{ old('price',$product->price ?? '') }}">

            </div>

            <div class="form-group">

                <label>Sele Price</label>

                <input
                    type="number"
                    step="0.01"
                    name="sele_price"
                    value="{{ old('price',$product->price ?? '') }}">

            </div>

            <div class="form-group">

                <label>Quantity</label>

                <input
                    type="number"
                    step="0.01"
                    name="quantity"
                    value="{{ old('price',$product->price ?? '') }}">

            </div>


            {{-- <div class="form-group">

                <label>Stock</label>

                <input
                    type="number"
                    name="stock"
                    value="{{ old('stock',$product->stock ?? '') }}">

            </div>

            <div class="form-group">

                <label>Status</label>

                <select name="status">

                    <option value="1"
                        @selected(old('status',$product->status ?? 1)==1)>
                        Active
                    </option>

                    <option value="0"
                        @selected(old('status',$product->status ?? 1)==0)>
                        Inactive
                    </option>

                </select>

            </div> --}}

            <div class="form-group">

                <label>Category</label>

                <select name="category_id">

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(old('category_id',$product->category_id ?? '')==$category->id)>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

            </div>

        </div>

    </div>

    <!-- ============================= -->
    <!-- Image -->
    <!-- ============================= -->

    <div class="form-card">

        <div class="card-header">

            <h2>Product Image</h2>

        </div>

        <div class="card-body">

            <div class="image-upload">

                <img
                    id="previewImage"
                    src="{{ isset($product) && $product->image ? asset('storage/'.$product->image) : asset('images/no-image.png') }}">

                <input
                    type="file"
                    id="image"
                    name="image">

            </div>

        </div>

    </div>

    <!-- ============================= -->
    <!-- Buttons -->
    <!-- ============================= -->

    <div class="form-actions">

        <a href="{{ route('products.index') }}"
           class="btn-cancel">

            Cancel

        </a>

        <button class="btn-primary">

            <i class="fa-solid fa-floppy-disk"></i>

            {{ $button }}

        </button>

    </div>

</form>