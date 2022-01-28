<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyEmail
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
        if (Auth::check() && (Auth::user()->v_otp == '0') ) {
            return redirect()->route('verify.email')->with('error','Verify Your Email!');
        }
        if (Auth::check() && (Auth::user()->profile == '0') ) {
            return redirect()->route('choose')->with('error','Complete Your Profile First!');
        }
        if (Auth::check() && (Auth::user()->response == '0') ) {
            return redirect()->route('profile')->with('error','Admin has to Verify your Profile');
        }
        else{
            return $next($request);
        }
    }
}
