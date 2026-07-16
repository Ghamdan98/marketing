<div class="form-card">

    <div class="card-header">

        <h2>Category Information</h2>

        <p>Fill in the category details below.</p>

    </div>

    <div class="card-body">

        <div class="two-columns">

            <div>

                <div class="form-group">

                    <label>Name</label>

                    <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}"
                        placeholder="Category Name">

                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group">

                    <label>Slug</label>

                    <input type="text" name="slug" value="{{ old('slug', $category->slug ?? '') }}"
                        placeholder="category-slug">

                    @error('description')
                        <span class="error">{{ $message }}</span>
                    @enderror

                </div>

                <div class="form-group">

                    <label>Description</label>

                    <textarea rows="6" name="description">{{ old('description', $category->description ?? '') }}</textarea>

                </div>


            </div>

            <div>

                <div class="image-upload">

                    <img id="preview"
                        src="{{ isset($category) && $category->image ? asset('storage/' . $category->image) : asset('images/no-image.png') }}"
                        alt="Preview">

                    <input type="file" name="image" id="image" accept="image/*">

                    @error('image')
                        <span class="error">{{ $message }}</span>
                    @enderror

                </div>

            </div>

        </div>

    </div>

</div>

<div class="form-actions">

    <a href="{{ route('category.index') }}" class="btn-cancel">

        Cancel

    </a>

    <button class="btn-primary">

        <i class="fa-solid fa-floppy-disk"></i>

        Save Category

    </button>

</div>
