<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if($request->routeIs(getenv('ADMIN_BASE_URL').'.*')){
            return $request->expectsJson() ? null : route(getenv('ADMIN_BASE_NAME').'.login');
        }


        if($request->routeIs('seller.*')){
            return $request->expectsJson() ? null : route(getenv('SELLER_BASE_NAME').'.login');
        }

        return $request->expectsJson() ? null : route('login');
    }
}
