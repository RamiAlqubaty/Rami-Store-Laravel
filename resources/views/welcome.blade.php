<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'figtree', sans-serif;
            background-color: #f9fafb;
            color: #1a202c;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            max-width: 500px;
            padding: 2rem;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        p {
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        a, button {
            display: inline-block;
            margin: 0.5rem;
            padding: 0.75rem 1.5rem;
            background-color: #6366f1;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.2s ease-in-out;
            border: none;
            cursor: pointer;
        }

        a:hover, button:hover {
            background-color: #4f46e5;
        }

        form {
            display: inline-block;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- إضافة شعار المتجر هنا -->
        <img src="{{ asset('images/logo.png') }}" alt="شعار المتجر" style="max-width: 150px; margin-bottom: 1rem;">

        <h1>مرحبًا بك في متجر الوفاء</h1>
        <p>متجر متخصص في توفير جميع مواد البناء باسعار مناسبة وجودة عالية وتوصيل بأسرع وقت لاي مكان في عدن </p>
        <p> العنوان : عدن كريتر, سوق البهرة </p>

        @auth
            <a href="{{ url('/dashboard') }}">الذهاب إلى لوحة التحكم</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">تسجيل الخروج</button>
            </form>
        @else
            <a href="{{ route('login') }}">تسجيل الدخول</a>
            <a href="{{ route('register') }}">إنشاء حساب</a>
            {{-- <a href="{{ route('guest.dashboard') }}">الدخول كضيف</a> --}}
        @endauth
    </div>
</body>
</html>
