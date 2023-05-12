<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdminMidlleware
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
        $adminsName = ['ahmed','joan','Nesreen'];
        $userName = Auth()->user()?->username;
        abort_if(collect($adminsName)->filter(fn($name) => $name == $userName )->count() == 0,400,'you are not authorized to create post' );
        return $next($request);
    }
}
