<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tenancy\Identification\Contracts\Tenant;
class TenantMiddleware
{
    public function handle($request, Closure $next)

    // identify the tenant and set the database connection
    {
        $hostname = $request->getHost();
        $tenant = Tenant::where('domain', $hostname)->first();
        if ($tenant) {
            tenant($tenant);
        }
        return $next($request);
    }
}