<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InboundController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->id){
            // $inbound = Inbound::find($id);
            $header = [
                'gudang_id' => "Gudang JKT",
                'm_transport_id' => "Truck",
                'm_asal_id' => "Cilegon",
                'code' => 'JKT009121',
                'kendaraan' => 'Truk',
                'receive_by' => 'Alex Afandi',
                'note' => 'Barang tiba dengan aman',
                'supir' => 'Jordi',
                'receive_at' => '2022-04-04',
                'created_at' => '2022-04-04',
                'updated_at' => '2022-04-04',
            ];
            return view('pages.inbound.detail', ['header'=>$header]);
        }
        return view('pages.inbound.index', [ ]);
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
        return redirect(url('inbound')."?id=1");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
