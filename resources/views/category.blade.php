@extends('layout.master')
@section('title' , 'Category')
@section('content')
<section class="header">

    <h1>Shop By Category</h1>
    <p>
        Explore our best product categories
    </p>

</section>

<!-- Categories -->

<section class="categories">

    <div class="category-grid">

        <!-- Category  -->
@foreach ( $category as $cat)
    

        <div class="cate_card">

            <img src="{{ asset('storage/'.$cat->image) }}" alt="">

            <div class="overlay">

                <h2>{{ $cat->name }}</h2>

                <p>{{ $cat->description }}</p>

                <a href="{{ route('category.product' , $cat->id) }}" class="btn">
                    View Products
                </a>

            </div>

        </div>
@endforeach
        <!-- Category 4 -->

    </div>

</section>
@endsection