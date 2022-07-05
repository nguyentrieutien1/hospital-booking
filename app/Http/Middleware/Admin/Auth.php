<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as au;
use RealRashid\SweetAlert\Facades\Alert;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!au::check()) {
            return redirect("/login");
        } else {
            if (au::user()->roleId != 1) {
                Alert::warning("Messenge", "Có Quyền Đâu Mà Đòi Vào ?");
                return redirect("/");
            }
            return $next($request);
        }
    }
}
