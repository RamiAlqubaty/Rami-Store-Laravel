<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // تحقق من تسجيل الدخول
        if (!auth()->check()) {
            return redirect('/login');  // غير رابط تسجيل الدخول حسب الحاجة
        }

        // تحقق هل المستخدم أدمن
        if (!auth()->user()->is_admin) {
            abort(403, 'غير مصرح بالدخول'); // ممنوع الدخول
        }

        return $next($request);
    }
}
