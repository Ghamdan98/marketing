@extends('layout.admin')

@section('content')
    <div class="categories-page">

        <div class="page-header">

            <h1>Categories</h1>
            @if (session('success'))
                <div class="success-message">

                    {{ session('success') }}

                </div>
            @endif
            <a href="{{ route('category.create') }}" class="add-btn">

                + Add Category

            </a>

        </div>

        <table class="categories-table">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Name</th>

                    <th>Description</th>

                    <th>Image</th>

                    <th>Actions</th>

                </tr>
            </thead>

            <tbody>

                @foreach ($category as $cate)
                    <tr>

                        <td>{{ $cate->id }}</td>

                        <td>{{ $cate->name }}</td>

                        <td>

                            {{ $cate->description }}

                        </td>
                        <td>
                        @if ($cate->image)
                        <img  class="category-image" src="{{ asset('storage/'.$cate->image) }}" alt="">
                        @else
                        no image
                        @endif
                        </td>
                        <td>
                            50 Iphone

                            {{-- {{ $category->products_count }} --}}

                        </td>

                        <td class="actions">

                            <a href="{{ route('category.edit',$cate->id) }}" class="edit-btn">

                                Edit

                            </a>

                            <form action="{{ route('category.destroy',$cate->id) }}" method="POST" onsubmit="confirmDelete()">

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
    <script>
        function confirmDelete() {
    // تظهر النافذة العادية للمستخدم
    if (confirm("هل أنت متأكد أنك تريد حذف هذا العنصر؟")) {
        // إذا ضغط المستخدم "موافق" (OK) يتم تنفيذ هذا الكود:
        alert("تم حذف العنصر بنجاح.");
        // (هنا تضع الكود الخاص بك الذي يحذف العنصر فعلياً من قاعدة البيانات أو السلة)
    } else {
        // إذا ضغط المستخدم "إلغاء" (Cancel) لن يحدث شيء وتغلق النافذة تلقائياً
        console.log("تم إلغاء الحذف");
    }
}
        </script>
@endsection
