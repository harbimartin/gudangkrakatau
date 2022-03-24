<?php

namespace App\Http\Controllers;

use App\MasterBillOfMaterial;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BillMaterialController extends Controller{
    /**
     * Display an list of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $error = $this->err_get('error');
        if (!$length = $request->el)
            $length = 10;
        $data = $this->getDataByRequest($request)->paginate($length);;
        return view('pages.master.bom.index', [ 'data' => $data->getCollection(), 'table'=>$this->tableProp($data), 'error'=>$error]);
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
        $paginate = MasterBillOfMaterial::filter($request);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MBillMaterial  $mBillMaterial
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        return view('pages.master.bom.detail', [ 'data'=>MasterBillOfMaterial::find($id) ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MBillMaterial  $mBillMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MBillMaterial  $mBillMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MBillMaterial  $mBillMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
