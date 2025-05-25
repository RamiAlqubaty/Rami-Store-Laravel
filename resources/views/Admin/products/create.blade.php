@extends('admin.layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-primary text-white rounded-top-4">
                    <h4 class="mb-0">🛒 إضافة منتج جديد</h4>
                </div>
                <div class="card-body p-4">

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">اسم المنتج:</label>
                            <input type="text" name="name" class="form-control rounded-3" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">الوصف:</label>
                            <textarea name="description" class="form-control rounded-3" rows="4">{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">السعر:</label>
                            <input type="number" name="price" step="0.01" class="form-control rounded-3" value="{{ old('price') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">التصنيف:</label>
                            <select name="category_id" class="form-select rounded-3" required>
                                <option value="">اختر التصنيف</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="form-label">صورة المنتج (اختياري):</label>
                            <input type="file" name="image" class="form-control rounded-3" accept="image/*">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success rounded-3">
                                <i class="bi bi-plus-circle"></i> إضافة المنتج
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
