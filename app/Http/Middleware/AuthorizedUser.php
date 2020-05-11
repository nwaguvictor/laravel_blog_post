<?php

namespace App\Http\Middleware;

use Closure;

class AuthorizedUser
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
        // Check that the authenticated user is and 'Admin'
        if ($request->user()->isAdmin() || $request->user()->isAuthor()) {
            return $next($request);
        }
        return redirect('/errors/404');
    }
}
