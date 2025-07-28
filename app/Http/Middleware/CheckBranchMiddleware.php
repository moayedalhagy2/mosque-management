<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckBranchMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();
        // إذا كان المستخدم مدير كامل (branch_id = null) فاتركه يمر
        if (is_null($user->branch_id)) {
            return $next($request);
        }

        // إذا كان الطلب يتضمن branch_id تأكد أنه مطابق لفرع المستخدم
        if ($request->has('branch_id') && $request->branch_id != $user->branch_id) {
            abort(403, 'Unauthorized action. (check branch middleware)');
        }

        return $next($request);
    }
}
