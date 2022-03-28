<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\MasterUnitOfMeasure;
use App\MasterVariant;
use App\MVariant;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VariantController extends Controller{
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
        return view('pages.master.brand.index', [ 'data' => $data->getCollection(), 'table'=>$this->tableProp($data), 'error'=>$error]);
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
        $paginate = MasterVariant::filter($request);
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
     * @param  \App\MVariant  $mVariant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MVariant  $mVariant
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        return view('pages.master.variant.detail', [ 'data'=>MasterVariant::find($id) ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MVariant  $mVariant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MVariant  $mVariant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
