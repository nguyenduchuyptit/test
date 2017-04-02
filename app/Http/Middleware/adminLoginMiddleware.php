<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::User())
        {
            if(Auth::User()->quyen==1 || Auth::User()->quyen==2)
            {
                return $next($request);
            }
            else{
                return redirect('admin/login')->with('error','Bạn không có quyền truy cập!!');
            }
        }
        else
        {
            return redirect('admin/login');
        }
    }
}
