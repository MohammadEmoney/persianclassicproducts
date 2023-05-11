<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TrackVisitors
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
        $ip = $request->ip();
        $visitorsIp = 'visitors_' . $ip;
        if(!Cache::get($visitorsIp, 0)){
            Cache::put($visitorsIp, $ip, now()->addMinutes(5)); // store for 5 minutes
            $key = 'visitors';
            $visitors = Cache::get($key, 0);
            $visitors++;
            Cache::put($key, $visitors, now()->addMinutes(5)); // store for 5 minutes

            $response = $next($request);
            $response->headers->set('X-Visitors-Count', $visitors); // add visitors count header

            return $response;
        }
        return $next($request);
    }
}
