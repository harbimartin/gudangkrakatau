<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\MasterAttribute;
use App\MasterUnitGroup;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AttributeController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if (!$length = $request->el)
            $length = 10;
        $select = [
            'group' => MasterUnitGroup::select('id','name','desc')->where('status', 1)->get()
        ];
        if ($request->id){
            return redirect(route('attr.value', ['id'=>$request->id]));
        }
        $error = $this->err_get('error');
        $data = $this->getDataByRequest($request)->paginate($length);
        return view('pages.master.attr.index', [ 'data' => $data->getCollection(), 'table'=>$this->tableProp($data), 'error'=>$error, 'select'=>$select]);
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
        $paginate = MasterAttribute::filter($request);
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
            'desc' => 'required',
        ])){
            return $this->err_handler($request, 'error', $validate);
        }
        try{
            MasterAttribute::create($request->toArray());
        }catch(Exception $th){
            return $this->err_handler($request, 'error', $th->getMessage());
        }
        return redirect($request->_last_);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\  $item
     * @return \Illuminate\Http\Response
     */
    public function show( $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\  $item
     * @return \Illuminate\Http\Response
     */
    public function edit( $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $item){
        if ($request->has('toggle')){
            MasterAttribute::find($item)->update(['status'=> $request->toggle]);
        }
        return redirect($request->_last_);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy( $item)
    {
        //
    }
}
