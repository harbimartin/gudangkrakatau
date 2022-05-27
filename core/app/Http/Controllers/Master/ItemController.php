<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\MasterItem;
use App\MasterItemClassification;
use App\MasterItemGroup;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->id){
            return redirect(route('item.attr', ['id'=>$request->id]));
        }
        $error = $this->err_get('error');
        if (!$length = $request->el)
            $length = 10;
        $data = $this->getDataByRequest($request)->paginate($length);
        $select = [
            'group' => MasterItemGroup::where('status', 1)->get(),
            'classification' => MasterItemClassification::where('status', 1)->get()
        ];
        return view('pages.master.item.index', [ 'data' => $data->getCollection(), 'table'=>$this->tableProp($data), 'error'=>$error, 'select'=>$select]);
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
        $paginate = MasterItem::filter($request);
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
            'group_id' => 'required',
            'classification_id' => 'required',
            'desc' => 'required',
            'upc' => 'required',
        ])){
            return $this->err_handler($request, 'error', $validate);
        }
        try{
            MasterItem::create($request->toArray());
        }catch(Exception $th){
            return $this->err_handler($request, 'error', $th->getMessage());
        }
        return redirect($request->_last_);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterItem  $item
     * @return \Illuminate\Http\Response
     */
    public function show(MasterItem $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterItem  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterItem $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterItem  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterItem $item){
        if ($request->has('toggle')){
            $item->update(['status'=> $request->toggle]);
        }
        return redirect($request->_last_);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterItem  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterItem $item)
    {
        //
    }
}
