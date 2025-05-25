@extends('admin.layouts.app')

@section('title', 'تعديل التصنيف')

@section('content')
    <h1>تعديل التصنيف</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">اسم التصنيف</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">تحديث</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
@endsection
