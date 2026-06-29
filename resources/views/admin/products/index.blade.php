@extends('layout.admin')
@section('content')
    <div class="products-page">

        <div class="page-header">

            <h1>Products</h1>
            @if (session('success'))
                <div class="success-message">

                    {{ session('success') }}

                </div>
            @endif
            <a href="{{ route('products.create') }}" class="add-btn">
                + Add Product
            </a>

        </div>

        <table class="products-table">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Image</th>

                    <th>Name</th>

                    <th>Price</th>

                    <th>Quantity</th>

                    <th>Category</th>

                    <th>Actions</th>

                </tr>

            </thead>

            <tbody>

                @foreach ($products as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        @if ($p->image)
                            <td>

                                <img class="category-image" src="{{ asset('storage/' . $p->image) }}" width="60">

                            </td>
                        @else
                            <td>
                                no image
                            </td>
                        @endif


                        <td><a class="product-link" href="{{ route('products.show', $p->id) }}">
                                {{ $p->name }}</a></td>

                        <td>{{ $p->price }}$</td>

                        <td>{{ $p->quantity }}</td>

                        <td>{{ $p->category->name }}</td>
                        <td class="actions">

                            <a href="{{ route('products.edit',$p->id) }}" class="edit-btn">

                                Edit

                            </a>

                            <form action="{{ route('products.destroy',$p->id) }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="delete-btn">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>
@endsection
