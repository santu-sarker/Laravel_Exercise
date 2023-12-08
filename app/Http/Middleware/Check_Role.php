<?php

namespace App\Http\Middleware;

use App\Models\Phone_Verification;
use Closure;
use Illuminate\Http\Request;

class Check_Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $test)
    {
        $code = Phone_Verification::select('verification_code')->where('user_id', '19')->first();
        dd($test, $code['verification_code']);
        return $next($request);
    }
}
