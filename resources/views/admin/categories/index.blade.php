@extends('layout.admin')

@section('title','Categories')

@section('content')

<div class="page-header">

    <div>

        <h1>Categories</h1>

        <p>Manage all product categories.</p>

    </div>

    <a href="{{ route('create_category') }}" class="btn-primary">

        <i class="fa-solid fa-plus"></i>

        Add Category

    </a>

</div>

<div class="table-card">

    <div class="table-header">

        <div class="table-title">

            <h2>Category List</h2>

            <p>{{ $categories->total() }} Categories Found</p>

        </div>

        <form method="GET">

            <div class="table-search">

                <i class="fa-solid fa-search"></i>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search category..."
                >

            </div>

        </form>

    </div>

    <table class="data-table">

        <thead>

            <tr>

                <th>Image</th>

                <th>Name</th>

                <th>Slug</th>

                <th>Products</th>

                <th>Created</th>

                <th width="170">Actions</th>

            </tr>

        </thead>

        <tbody>

        @forelse($categories as $category)

            <tr>

                <td>

                    <img
                        class="table-image"
                        src="{{ asset('storage/'.$category->image) }}"
                        alt="{{ $category->name }}"
                    >

                </td>

                <td>

                    <strong>{{ $category->name }}</strong>

                </td>

                <td>

                    {{ $category->slug }}

                </td>

                <td>

                    <span class="badge info">

                        {{ $category->product_count }}

                    </span>

                </td>

                <td>

                    {{ $category->created_at->format('d M Y') }}

                </td>

                <td>

                    <div class="table-actions">

                        <a
                            href="{{ route('category.show',$category) }}"
                            class="action-btn view"
                        >

                            <i class="fa-solid fa-eye"></i>

                        </a>

                        <a
                            href="{{ route('category.edit',$category) }}"
                            class="action-btn edit"
                        >

                            <i class="fa-solid fa-pen"></i>

                        </a>

                        <form
                            action="{{ route('category.destroy',$category) }}"
                            method="POST"
                            onsubmit="return confirm('Delete this category?')"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                class="action-btn delete"
                                type="submit"
                            >

                                <i class="fa-solid fa-trash"></i>

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="6">

                    <div class="empty-table">

                        <i class="fa-solid fa-layer-group"></i>

                        <h3>No Categories Found</h3>

                        <p>Create your first category.</p>

                    </div>

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

    <div class="pagination-wrapper">

        {{-- {{ $categories->links() }} --}}

    </div>

</div>

@endsection