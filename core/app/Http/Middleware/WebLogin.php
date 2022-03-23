<?php

namespace App\Http\Middleware;

use Closure;

class WebLogin{
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
            return redirect(url('/home'));
        }
        return $next($request);
    }
}
