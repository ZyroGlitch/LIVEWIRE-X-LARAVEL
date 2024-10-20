<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            // Get the user ID from the session
        $userID = Session::get('userID');

        if ($userID) {
            // Fetch the user from the database using the ID stored in session
            $user = User::where('userID',$userID)->first();
            
            if ($user->role == 'Customer') {
                // Proceed with the request
                return $next($request);
            }
        }

        // Return unauthorized if user is not found or not a customer
        abort(401);
    }
}