<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PreventRouteChangeForLoggedInUser
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (Auth::check() && in_array(Auth::user()->role_acc, $roles)) {
            return $next($request);
        }

        // หรือให้เปลี่ยนเส้นทาง URL หรือแสดงข้อความเตือน ตามความเหมาะสม
        return redirect()->back(); // ตัวอย่างการกลับไปที่หน้าหลัก
    }
}