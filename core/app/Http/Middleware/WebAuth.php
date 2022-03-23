<?php

namespace App\Http\Middleware;

use App\Approval;
use App\ApprovalAanwijzingV;
use App\ApprovalCobV;
use App\ApprovalCoqV;
use App\ApprovalNegoV;
use App\User;
use Closure;
use Illuminate\Support\Facades\DB;

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
