<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\MasterAttribute;
use App\MasterItemGroup;
use App\MasterItemGroupSku;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ItemGroupAttrController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->id){
            $herror = $this->err_get('herror');
            $error = $this->err_get('error');
            $header = MasterItemGroup::find($request->id);
            $select = [
                'attr' => MasterAttribute::where('status', 1)->get()
            ];
            return view('pages.master.igroup.attr', [ 'header' => $header , 'herror' => $herror, 'select'=>$select, 'error' => $error ]);
        }else
            return redirect(route('igroup'));
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
        $paginate = MasterItemGroup::filter($request);
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
            'sequence' => 'required',
            'm_attribute_id' => 'required',
        ])){
            return $this->err_handler($request, 'error', $validate);
        }
        try{
            $request['m_item_group_id'] = $request->id;
            MasterItemGroupSku::create($request->toArray());
        }catch(Exception $th){
            return $this->err_handler($request, 'error', $th->getMessage());
        }
        return redirect($request->_last_);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MasterItemGroup  $item
     * @return \Illuminate\Http\Response
     */
    public function show(MasterItemGroup $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MasterItemGroup  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterItemGroup $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MasterItemGroup  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        if ($request->has('toggle')){
            MasterItemGroup::find($id)->update(['status'=> $request->toggle]);
        }else if ($request->has('shift')){
            // Fastest Update Sequence Query
            $target = MasterItemGroupSku::find($id);
            $high = 0; $high_obj = null; $higher = 0;
            if ($request->shift == 'head'){
                foreach( $target->sibling as $sibling){
                    if ($sibling->sequence < $target->sequence){
                        $higher = $high;
                        $high = $sibling->sequence;
                        $high_obj = $sibling;
                    }
                }
            }else{ // 'tail'
                foreach( $target->siblingr as $sibling){
                    if ($sibling->sequence > $target->sequence){
                        $higher = $high;
                        $high = $sibling->sequence;
                        $high_obj = $sibling;
                    }
                }
                if ($higher == 0)
                    $higher = $high + 10;
            }
            $mid = round(($high + $higher) / 2);
            if ($high_obj){
                if ($mid == $high){
                    if ($high_obj)
                        $high_obj->update(['sequence' => $target->sequence]);
                    $target->update(['sequence' => $higher]);
                }else{
                    $target->update(['sequence' => $mid]);
                }
            }
        }
        return redirect($request->_last_);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterItemGroup  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){
        MasterItemGroupSku::find($id)->delete();
        return redirect($request->_last_);
    }
}
