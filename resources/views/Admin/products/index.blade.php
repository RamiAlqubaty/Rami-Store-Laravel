@extends('admin.layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>المنتجات</h2>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">إضافة منتج جديد</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>الصورة</th>
            <th>الاسم</th>
            <th>الوصف</th>
            <th>السعر</th>
            <th>التصنيف</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
            <tr>
                <td>
                    @if($product->image)
                        <img src="{{ asset('uploads/' . $product->image) }}" width="70">
                    @else
                        <span>لا توجد صورة</span>
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ Str::limit($product->description, 50) }}</td>
                <td>{{ number_format($product->price, 2) }} دولار</td>
                <td>
                    {{ $product->category ? $product->category->name : 'بدون تصنيف' }}
                </td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">تعديل</a>

                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6" class="text-center">لا توجد منتجات حالياً.</td></tr>
        @endforelse
    </tbody>
</table>

{{ $products->links() }}
@endsection
