<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RefreshHomeCache
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
        // Check if it's a request to the home page
        if ($request->is('/') || $request->is('home')) {
            // Force refresh of the home page cache by temporarily forgetting and regenerating
            $cacheKeys = ['home.settings', 'home.projects', 'home.services', 'home.skills', 'home.socialLinks'];

            foreach ($cacheKeys as $key) {
                // Always refresh cache for now to ensure social links show up
                Cache::forget($key);
                Cache::forget($key . '_timestamp');
            }

            // Force refresh all cache keys
            Cache::flush();
        }

        return $next($request);
    }
}
