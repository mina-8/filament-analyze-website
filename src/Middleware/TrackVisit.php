<?php

namespace Mina\AnalyzeWebsite\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mina\AnalyzeWebsite\Facade\Driver;
use Symfony\Component\HttpFoundation\Response;

class TrackVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (!config('analyze-website.enabled')) {
            return $response;
        }

        if ($this->shouldIgnore($request)) {
            return $response;
        }

        if (
            auth()->guard('web')->check() &&
            ! config('analyze-website.track_authenticated')
        ) {
            return $response;
        }

        if (
            auth()->guard('web')->guest() &&
            ! config('analyze-website.track_guests')
        ) {
            return $response;
        }

        // Logic to track the visit can be implemented here

        Driver::track([
            'url' => $request->fullUrl(),
            'path' => $request->path(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'referer' => $request->headers->get('referer'),
            'session_id' => session()->getId(),
            'visited_at' => now(),
        ]);

        return $response;
    }

    private function shouldIgnore(Request $request): bool
    {
        foreach (config('analyze-website.exclude_urls', []) as $pattern) {
            if ($request->is($pattern)) {
                return true;
            }
        }

        $path = $request->path();

        $extension = pathinfo($path, PATHINFO_EXTENSION);

        if (
            $extension &&
            in_array(
                strtolower($extension),
                config('analyze-website.exclude_extensions', [])
            )
        ) {
            return true;
        }


        return false;
    }
}
