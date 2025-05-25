<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة الزائر</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f0f4f8;
            text-align: center;
            padding: 2rem;
        }
        h1 {
            color: #333;
        }
        a {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background-color: #6366f1;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>أهلًا بك زائرنا الكريم!</h1>
    <p>هذه لوحة معلومات الزائر، يمكنك تصفح المحتوى العام هنا بدون تسجيل الدخول.</p>
    <a href="{{ route('register') }}">تسجيل الدخول للوصول إلى مزيد من الميزات</a>
</body>
</html>
