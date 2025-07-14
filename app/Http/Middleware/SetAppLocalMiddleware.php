<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetAppLocalMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($acceptLanguage=$request->header('Accept-Language')){

            $locale = substr( $acceptLanguage, 0, 2);
        
            // Clean and validate
            $locale = strtolower(trim($locale));
            
            // Check if supported
            if (!in_array($locale, ['ar', 'en'])) {
                $locale = 'ar'; // Default language
            }
            
            app()->setLocale($locale);
        }

         
        return $next($request);
    }
}
