<?php

namespace App\Http\Controllers;

use App\Menu;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // $out = [];
        //     foreach (Route::getRoutes()->get() as $r){
        //         if(isset($r->action['controller'])){
        //         $out[] = $r->action['controller'];
        //         }
        //     }
        // dd($out);
        // return;
        if (Auth::user()){
            
            return route('home');
        }
        $error = $this->err_get('error');
        return view('login', [ 'error' => $error ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // LOGIN
        $credentials = $request->only('username', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $menus = Menu::where('parent', '=', NULL)->get();

            foreach ($menus as $key => $value) {
                $data['menu'][$key]['header']['name'] = $value->name;
                $data['menu'][$key]['header']['key'] = $value->key;
                $data['menu'][$key]['header']['status'] =0;
                if ($value->parent()->count() > 0) {
                    $data['menu'][$key]['parent']= $this->parents($value, $key); 
                }
                
            }
            \Session::put('menu', $data);

            return redirect('/home');
        }
        return $this->err_handler($request, 'error', "Username dan password tidak cocok!");
        // return $request->toArray();
    }
    public function parents($value, $key)
    {
        foreach($value->parent()->get() as $ky => $val ){
            $data[$ky]['name'] = $val->name;
            $data[$ky]['key'] = $val->key;
            if ($val->parent()->count() > 0) {
                $data[$ky]['child'] = $this->parents($val, $ky); 
            }
        }

        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
