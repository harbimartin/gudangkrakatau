<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\MasterAttribute;
use App\MasterAttributeValue;
use App\MasterItem;
use App\MasterItemAttribute;
use App\MasterItemAttributeValue;
use App\MasterItemClassification;
use App\MasterItemGroup;
use App\MasterUnitMeasure;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ItemAttributeController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $herror = $this->err_get('herror');
        $error = $this->err_get('error');
        if ($request->id){
            if (!$length = $request->el)
                $length = 10;
            $header = MasterItem::find($request->id);
            $data = $this->getDataByRequest($request)->paginate($length);
            $id = $request->id;
            $igroup = $header->group_id;
            $select = [
                'attribute' => MasterAttribute::where('status', 1)->whereDoesntHave('item', function($q)use($id){
                    $q->where('m_item_id', $id);
                })->withCount(['sku' => function($q)use($igroup){
                    $q->where('m_item_group_id', $igroup);
                }])->orderBy('sku_count','DESC')->get(),
                'values' => MasterAttributeValue::get(),
                'uom' => MasterUnitMeasure::where('status', 1)->get(),
                'group' => MasterItemGroup::where('status', 1)->get(),
                'classification' => MasterItemClassification::where('status', 1)->get()
            ];
        }else
            return redirect(route('item'));
        return view('pages.master.item.attr', [ 'header'=> $header, 'data' => $data->getCollection(), 'table'=>$this->tableProp($data), 'herror'=>$herror, 'error'=>$error, 'select'=>$select]);
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
        $paginate = MasterItemAttribute::filter($request)->where('m_item_id', $request->id);
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
            'm_attr_id' => 'required',
            'value' => 'required',
        ])){
            return $this->err_handler($request, 'error', $validate);
        }
        try{
            $attrarr = [
                'value' => $request->value,
                'm_attr_id' => $request->m_attr_id,
                'm_uom_id' => $request->m_uom_id
            ];
            if (!$attrval = MasterAttributeValue::where($attrarr)->first()){
                if ($request->has('code')){
                    $attrarr['code'] = $request->code;
                    $attrval = MasterAttributeValue::create($attrarr);
                }else{
                    $request['need_code'] = true;
                    return $this->err_handler($request, 'error', "Nilai Atribute belum pernah diinput sebelumnya, harap masukan kode untuk wewakili nilai atribut ini.");
                }
            }
            if (MasterItemAttribute::where(['m_attr_id' => $request->m_attr_id, 'm_item_id' => $request->id])->first()){
                return $this->err_handler($request, 'error', "Atribute yang sama Sudah Ditambahkan!");
            }
            // Attribute Value Founded!
            $attrval->item_attr()->create([
                'm_item_id' => $request->id,
                'm_attr_id' => $request->m_attr_id,
            ]);
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
    public function update(Request $request, $id){
        $item = MasterItem::find($id);
        if ($request->has('toggle')){
            $item->update(['status'=> $request->toggle]);
        }else{
            if ($validate = $this->validing($request->all(), [
                'name' => 'required',
                'group_id' => 'required',
                'classification_id' => 'required',
                'desc' => 'required',
                'upc' => 'required',
            ])){
                return $this->err_handler($request, 'herror', $validate);
            }
            $item->update($request->toArray());
        }
        return redirect($request->_last_);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MasterItem  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id){
        if ($item = MasterItemAttribute::find($id))
            $item->delete();
        return redirect($request->_last_);
    }
}
