<?php

namespace App\Http\Middleware;
use Closure;

class WebAuth{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        session_start();
        if(isset($_SESSION['gudang_id']) || !empty($_SESSION['gudang_id'])){
            return $next($request);
        }
        return redirect(url('/login'));
    }
}
