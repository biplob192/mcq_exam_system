<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\BaseController as BaseController;

class EnsureTokenAccessAbility extends BaseController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);

        $user = Auth::user();
        if ($user->tokenCan('access')) {
            return $next($request);
        }
        return $this->sendError('Invalid access token!', '', 401);
    }
}
