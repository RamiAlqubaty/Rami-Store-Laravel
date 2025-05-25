@extends('admin.layouts.app')

@section('title', 'إضافة تصنيف جديد')

@section('content')
    <h1>إضافة تصنيف جديد</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">اسم التصنيف</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <button type="submit" class="btn btn-success">حفظ</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
@endsection
