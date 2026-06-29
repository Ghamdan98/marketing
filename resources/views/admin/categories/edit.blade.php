@extends('layout.admin')

@section('content')
    <div class="category-container">

        <div class="category-header">

            <div>

                <h1>Edit Category</h1>

                <p></p>

            </div>

        </div>

        <form method="POST" action="{{ route('category.update',$category->id) }}" class="category-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">

                <label>Category Name</label>

                <input type="text" name="name" value="{{ $category->name }}" placeholder="Enter category name">

            </div>

            <div class="form-group">

                <label>Slug</label>

                <input type="text" name="slug" value="{{ $category->slug }}" placeholder="category-slug">

            </div>

            <div class="form-group">

                <label>Description</label>

                <textarea name="description"  placeholder="Enter category description">{{ $category->description }}</textarea>

            </div>


            <div class="form-group">

                <label>Image</label>

                <input type="file" name="image" placeholder="category-Image">

            </div>

            <div class="form-buttons">

                <button type="button" class="cancel-btn">
                    Cancel
                </button>

                <button type="submit" class="save-btn">
                    Save Category
                </button>

            </div>

        </form>

    </div>
@endsection
