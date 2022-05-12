<?php

namespace App\Http\Middleware;

use App\Services\ActivityLandingService;
use Closure;
use Illuminate\Http\Request;

class AcivityMiddleware
{
    protected ActivityLandingService $service;

    public function __construct(ActivityLandingService $service)
    {
        $this->service = $service;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $route = $request->route()->getName();
        $this->service->storeActivity($route);

        return $next($request);
    }
}
