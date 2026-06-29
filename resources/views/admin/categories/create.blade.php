@extends('layout.admin')

@section('content')
    <div class="category-container">

        <div class="category-header">

            <div>

                <h1>Add New Category</h1>

                <p>Create a new category for your store</p>

            </div>

        </div>

        <form method="POST" action="{{ route('category.store') }}" class="category-form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">

                <label>Category Name</label>

                <input type="text" name="name" placeholder="Enter category name">

            </div>

            <div class="form-group">

                <label>Slug</label>

                <input type="text" name="slug" placeholder="category-slug">

            </div>

            <div class="form-group">

                <label>Description</label>

                <textarea name="description" placeholder="Enter category description"></textarea>

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
