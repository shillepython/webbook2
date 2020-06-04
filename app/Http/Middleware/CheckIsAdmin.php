<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdmin
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
        $user = \Auth::user();

        if (!$user->isAdmin()){
            return redirect()
                ->route('Book.book.index')
                ->withErrors(['msg' => 'You do not have enough rights']);
        }
        return $next($request);
    }
}
