@extends('layout.master')

@section('title', 'Categories')

@section('content')

<section class="page-header">

    <div class="container">

        <h1 class="page-title">
            Shop By Category
        </h1>

        <p class="page-subtitle">
            Explore our best product categories.
        </p>

    </div>

</section>


<section class="categories-page">

    <div class="container">

        <div class="category-grid">

            @foreach ($category as $cat)

                <a href="{{ route('category.product', $cat->id) }}"
                   class="category-link">

                    <div class="card category-card">

                        <div class="category-image">

                            <img
                                src="{{ asset('storage/' . $cat->image) }}"
                                class="card-image"
                                alt="{{ $cat->name }}">

                        </div>

                        <div class="card-body">

                            <h3 class="card-title">

                                {{ $cat->name }}

                            </h3>

                            <p class="card-text">

                                {{ Str::limit($cat->description, 80) }}

                            </p>

                            <span class="category-action">

                                View Products →

                            </span>

                        </div>

                    </div>

                </a>

            @endforeach

        </div>

    </div>

</section>

@endsection