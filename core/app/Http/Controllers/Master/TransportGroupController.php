<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\MasterTransportGroup;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TransportGroupController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $error = $this->err_get('error');
        if (!$length = $request->el)
            $length = 10;
        $data = $this->getDataByRequest($request)->paginate($length);;
        return view('pages.master.transgroup.index', [ 'data' => $data->getCollection(), 'table'=>$this->tableProp($data), 'error'=>$error]);
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
        $paginate = MasterTransportGroup::filter($request);
        return $paginate;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'name' => 'required',
            'code' => 'required',
            'desc' => 'required',
        ])){
            return $this->err_handler($request, 'error', $validate);
        }
        try{
            MasterTransportGroup::create($request->toArray());
        }catch(Exception $th){
            return $this->err_handler($request, 'error', $th->getMessage());
        }
        return redirect($request->_last_);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterTransportGroup  $uom
     * @return \Illuminate\Http\Response
     */
    public function show(MasterTransportGroup $uom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterTransportGroup  $uom
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterTransportGroup $uom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterTransportGroup  $uom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        if ($request->has('toggle')){
            MasterTransportGroup::find($id)->update(['status'=> $request->toggle]);
        }
        return redirect($request->_last_);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterTransportGroup  $uom
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterTransportGroup $uom)
    {
        //
    }
}
