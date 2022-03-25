<?php

namespace App\Http\Middleware;

use App\Menu;
use Closure;

class Menus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        \Session::forget('menu');
        $menus = Menu::where('parent', '=', NULL)->get();

        foreach ($menus as $key => $value) {
            $data[$key]['name'] = $value->name;
            $data[$key]['key'] = $value->key;
            $data[$key]['icon'] = $value->icon;
            $data[$key]['status'] =0;
            if ($value->parent()->count() > 0) {
                $data[$key]['children']= $this->children($value, $key);
            }

        }
        \Session::put('menu', $data);
        return $next($request);
    }
    public function children($value, $key){
        foreach($value->parent()->get() as $ky => $val ){
            $data[$ky]['name'] = $val->name;
            $data[$ky]['key'] = $val->key;
            $data[$ky]['icon'] = $val->icon;
            if ($val->parent()->count() > 0) {
                $data[$ky]['child'] = $this->children($val, $ky);
            }
        }
        return $data;
    }
}
