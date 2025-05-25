@extends('admin.layouts.app')

@section('title', 'منتجات التصنيف: ' . $category->name)

@section('content')
    <h1>المنتجات التابعة للتصنيف: {{ $category->name }}</h1>

    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mb-3">رجوع للتصنيفات</a>

    @if($products->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>الوصف</th>
                    <th>السعر</th>
                    <th>الصورة</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            @if ($product->image)
                                <img src="{{ asset('uploads/' . $product->image) }}" width="60" height="60" alt="صورة">
                            @else
                                لا يوجد
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    @else
        <p>لا توجد منتجات مرتبطة بهذا التصنيف.</p>
    @endif
@endsection
