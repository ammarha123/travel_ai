<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * Returning null to prevent automatic redirection to a specific route.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Return null to prevent automatic redirection
        if (!$request->expectsJson()) {
            return null;
        }
    }
}

