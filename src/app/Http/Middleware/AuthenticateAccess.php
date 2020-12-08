<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthenticateAccess
{
    Use ApiResponser;
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $validSecrets = explode(',', env('ACCEPTED_SECRETS'));

        if (in_array($request->header('Authorization'), $validSecrets)) {
            return $next($request);
        }

        return $this->errorResponse('Unauthorized request key', Response::HTTP_UNAUTHORIZED);
    }
}
