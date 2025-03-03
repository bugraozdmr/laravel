<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role,$something): Response
    {
        // dd($something);die();

        // formdan id almak
        // $user = User::findOrFail($request->user_id);

        // parametre olarak id almak
        // localhost:8000/user/dashboard?id=1
        $user = User::findOrFail($request->id);

        /*if($user->role === 'admin') {
            return $next($request);
        }*/

        if($user->role === $role) {
            return $next($request);
        }

        return abort(500);
    }
}
