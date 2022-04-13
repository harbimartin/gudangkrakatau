<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\MasterAttribute;
use App\MasterAttributeValue;
use App\MasterUnitGroup;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $error = $this->err_get('herror');
        if ($request->id){
            if (!$length = $request->el)
                $length = 10;
            $select = [
                'group' => MasterUnitGroup::select('id','name','desc')->where('status', 1)->get()
            ];
            $header = MasterAttribute::find($request->id);
            $data = $this->getDataByRequest($request)->paginate($length);
            return view('pages.master.attr.value', [ 'header' => $header , 'data' => $data, 'table'=>$this->tableProp($data), 'select' => $select, 'error'=>$error]);
        }else
            return redirect(route('attr'));
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
        $paginate = MasterAttributeValue::filter($request);
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
    public function update(Request $request, $id){
        switch($request->__type){
            case 'update':
                try{
                    MasterAttribute::find($id)->update($request->toArray());
                }catch(Exception $th){
                    return $this->err_handler($request, 'error', $th->getMessage());
                }
                return redirect($request->_last_);
                break;
        }
        return $request->toArray();
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
