<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller{
    /**
     * Display a login form
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
     * Store data to Login
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // LOGIN
        $credentials = $request->only('username', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect('/home');
        }
        return $this->err_handler($request, 'error', "Username dan password tidak cocok!");
        // return $request->toArray();
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
