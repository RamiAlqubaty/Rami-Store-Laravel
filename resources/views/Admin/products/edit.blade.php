@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>تعديل المنتج: {{ $product->name }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">اسم المنتج:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">الوصف:</label>
            <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">السعر:</label>
            <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">التصنيف:</label>
            <select name="category_id" class="form-control" required>
                <option value="">اختر التصنيف</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">صورة المنتج (اختياري):</label>
            <input type="file" name="image" class="form-control-file" accept="image/*">
            @if($product->image)
                <div style="margin-top:10px;">
                    <img src="{{ asset('uploads/' . $product->image) }}" alt="{{ $product->name }}" width="150">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-success">تحديث المنتج</button>
    </form>
</div>
@endsection
