<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class NavigationAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Allow access to the home page without a token
        if ($request->route()->getName() === 'home') {
            // Generate a new navigation token for the home page
            $token = Str::random(40);
            Session::put('navigation_token', $token);

            // Add the token to the response headers for JavaScript to capture
            $response = $next($request);
            $response->headers->set('X-Nav-Token', $token);
            return $response;
        }

        // Check if request has a valid navigation token
        $token = $request->header('X-Nav-Token') ?? $request->query('nav_token');

        if (!$token || $token !== Session::get('navigation_token')) {
            // Redirect to home with an error message
            return redirect()->route('home')
                ->with('error', 'Direct access to pages is not allowed. Please use the navigation menu.');
        }

        // Generate a new token for the next request
        $newToken = Str::random(40);
        Session::put('navigation_token', $newToken);

        // Add the new token to the response headers
        $response = $next($request);
        $response->headers->set('X-Nav-Token', $newToken);
        return $response;
    }
}
