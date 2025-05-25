@extends('admin.layouts.app')

@section('title', 'إدارة التصنيفات')

@section('content')
    <h1>التصنيفات</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">إضافة تصنيف جديد</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>رقم</th>
                <th>اسم التصنيف</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('admin.categories.products', $category->id) }}" class="btn btn-info btn-sm">عرض المنتجات</a>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">لا توجد تصنيفات.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $categories->links() }}
@endsection
