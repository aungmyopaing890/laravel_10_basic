<?php

namespace App\Http\Middleware;

use App\Models\Student;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->bearerToken()) {
            return response()->json(["message" => 'Api Token is required!'], 401);
        }

        $student = Student::where('api_token', $request->bearerToken())->first();
        if (is_null($student)) {
            return response()->json(["message" => 'Api Token is in correct!'], 401);
        }
        session(["auth" => $student]);
        return $next($request);
    }
}
