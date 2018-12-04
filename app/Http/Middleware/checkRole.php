<?php

namespace App\Http\Middleware;

use Closure;
use App\Role;
use Auth;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::User();
          if($user->hasRole($role)){
            return $next($request);
          }

        abort(403, 'Unauthorized action.');
    }
}
