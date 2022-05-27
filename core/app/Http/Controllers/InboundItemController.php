<?php

namespace App\Http\Controllers;

use App\Asal;
use App\Gudang;
use App\InboundHeader;
use App\InboundItem;
use App\MasterItem;
use App\MasterTransport;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InboundItemController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $herror = $this->err_get('herror');
        $error = $this->err_get('error');
        if (!$request->id){
            return redirect(route('inbound'));
        }
        if ($header = InboundHeader::find($request->id)){
            $select = [
                'item' => MasterItem::where('status', 1)->get(),
                'gudang' => Gudang::where('status', 1)->get(),
                'angkutan' => MasterTransport::where('m_transports.status', 1)->leftJoin('m_transport_groups', function($q){
                    $q->on('m_transports.id', 'm_transport_groups.id');
                })->select('m_transports.*', 'm_transport_groups.name as tname', 'm_transport_groups.code as tcode')->get(),
                'asal' => Asal::where('status', 1)->get(),
                'user' => User::where('status', 1)->get()
            ];
            if (!$length = $request->el)
                $length = 10;
            $data = $this->getDataByRequest($request)->paginate($length);
            return view('pages.inbound.item', [ 'header'=>$header, 'data'=> $data->getCollection(), 'table'=>$this->tableProp($data), 'herror'=>$herror, 'error' => $error, 'select'=>$select]);
        }else{
            $this->err_handler($request, 'error', 'Header Inbound tidak ditemukan!', false);
            return redirect(route('inbound'));
        }
    }
    /**
     * Function to export excel files.
     *
     * @return \Illuminate\Http\Response
     */
    public function export(Request $request){
        return Excel::download($this->getDataByRequest($request)->get(), 'MRA_OVERVIEW_'.date("YmdHis").'.xlsx');
    }

    /**
     * Function to get MasterBillOfMaterial list
     *
     * @return \Illuminate\Http\Response
     */
    public function getDataByRequest(Request $request){
        $paginate = InboundItem::select('t_inbound_items.*', 'm_items.name', 'group_id', 'classification_id', 'desc', 'upc')->leftJoin('m_items', function($q){
            $q->on('m_items.id', 't_inbound_items.m_item_id');
        })->filter($request);
        // $paginate = InboundItem::filter($request)->where('t_inbound_header_id', $request->id);
        return $paginate;
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
            'm_item_id' => 'required',
            'quantity' => 'required'
        ])){
            return $this->err_handler($request, 'error', $validate);
        }
        try{
            $request['t_inbound_header_id'] = $request->id;
            InboundItem::create($request->toArray());
        }catch(Exception $th){
            return $this->err_handler($request, 'error', $th->getMessage());
        }
        return redirect(route('inbound.item', ['id'=>$request->id]));
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
    public function destroy(Request $request, $id){
        if ($item = InboundItem::find($id))
            $item->delete();
        return redirect($request->_last_);
    }
}
