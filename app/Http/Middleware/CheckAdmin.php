<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() == null) {
            return redirect()->route('front.home');
        }

        if ($request->user()->type != 'Admin') {
            // session()->flash('error','You are not authorized to access this page.');
            return redirect()->route('account.profile');
        }

        // if ($request->user()->type != 'Artisan') {
        //     // session()->flash('error','You are not authorized to access this page.');
        //     return redirect()->route('account.profile');
        // }

        // if ($request->user()->type != 'Client') {
        //     // session()->flash('error','You are not authorized to access this page.');
        //     return redirect()->route('account.profile');
        // }

        return $next($request);
    }
}
