<?php

namespace App\Http\Controllers;

use App\Asal;
use App\Gudang;
use App\InboundHeader;
use App\MasterTransport;
use App\User;
use Exception;
use Illuminate\Http\Request;

class InboundController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->id){
            return redirect(route('inbound.item', ['id'=>$request->id]));
        }
        $error = $this->err_get('error');
        $select = [
            'gudang' => Gudang::where('status', 1)->get(),
            'angkutan' => MasterTransport::where('m_transports.status', 1)->leftJoin('m_transport_groups', function($q){
                $q->on('m_transports.id', 'm_transport_groups.id');
            })->select('m_transports.*', 'm_transport_groups.name as tname', 'm_transport_groups.code as tcode')->get(),
            'asal' => Asal::where('status', 1)->get(),
            'user' => User::where('status', 1)->get()
        ];
        return view('pages.inbound.index', [ 'error' => $error, 'select'=>$select]);
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
        if ($validate = $this->validing($request->all(), [
            'note' => 'required',
            'm_gudang_id' => 'required',
            'm_transport_id' => 'required',
            'supir' => 'required',
            'receive_by' => 'required',
            'm_asal_id' => 'required',
            'receive_at' => 'required'
        ])){
            return $this->err_handler($request, 'error', $validate);
        }
        try{
            $inbound = InboundHeader::create($request->toArray());
        }catch(Exception $th){
            return $this->err_handler($request, 'error', $th->getMessage());
        }
        return redirect(route('inbound.item').'?id='.$inbound->id);
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
