<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\MasterUnitGroup;
use App\MasterUnitMeasure;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UnitMeasureController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $error = $this->err_get('error');
        if (!$length = $request->el)
            $length = 10;
        $data = $this->getDataByRequest($request)->paginate($length);
        $select = [
            'group' => MasterUnitGroup::where('status', 1)
        ];
        return view('pages.master.uom.index', [ 'data' => $data->getCollection(), 'table'=>$this->tableProp($data), 'error'=>$error, 'select'=>$select]);
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
        $paginate = MasterUnitMeasure::filter($request);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterUnitMeasure  $uom
     * @return \Illuminate\Http\Response
     */
    public function show(MasterUnitMeasure $uom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterUnitMeasure  $uom
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterUnitMeasure $uom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterUnitMeasure  $uom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterUnitMeasure $uom){
        if ($request->has('toggle')){
            $uom->update(['status'=> $request->toggle]);
        }
        return redirect($request->_last_);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterUnitMeasure  $uom
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterUnitMeasure $uom)
    {
        //
    }
}
