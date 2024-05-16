<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use App\Models\UserToken;

class TokenMiddleware
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
        $token = $request->bearerToken();

        $tokenUser = UserToken::where('token', $token)->firstOrFail();

        if (Carbon::create($tokenUser->token_created_at)->diffInMinutes(Carbon::now()) > 60) {
            return response()->json([
                'error' => 'Token expired'
            ], 401);
        }

        $request->merge([
            'tokenUserID' => $tokenUser->user_id
        ]);

        return $next($request);
    }
}
