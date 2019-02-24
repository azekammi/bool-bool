<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Session;
use Lang;
use Auth;
use DB;

class IsAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::has("user")) {
            $user = DB::table("users_clients")
                ->where(["id" => Session::get("user.id"), "status" => 1])
                ->select("id")
                ->first();

            if($user) {
                return $next($request);
            }
            else{
                Session::forget("user");
            }
        }

        return redirect()->route('login');
    }
}
