<?php

namespace App\Http\Controllers;

use App\Exports\ExportOverview;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class OverviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $error = $this->err_get('error');
        $data = $this->getDataByRequest($request);
        return view('pages.overview', [ 'data' => $data->getCollection(), 'table'=>$this->tableProp($data), 'error'=>$error]);
    }

    public function exporte(Request $request){
        return Excel::download(new ExportOverview($this->getDataByRequest($request)->getCollection()), 'MRA_OVERVIEW_'.date("YmdHis").'.xlsx');
    }

    public function getDataByRequest(Request $request){
        if (!$length = $request->el)
            $length = 10;

        //DAPETIN DATA
        $div_id = $_SESSION['ebudget_division_id'];
        $user_id = $_SESSION['ebudget_id'];
        $paginate = User::filter($request)->where(function($qw)use($div_id, $user_id){
            $qw->whereHas('budget_versions',function($q)use($div_id){
                $q->where('divisions_id', $div_id);
            })->orWhereHas('status', function($q)use($user_id){
                $q->where('user_id', $user_id);
            });
        })
        ->with(['doc_types','budget_versions'])->paginate($length);
        return $paginate;
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
        switch($request->type){
            case 'update aja':
                break;
            case 'approve':
                break;
            case 'decline':
                    return $this->err_handler($request, 'error', "Semisal Error!");
                break;
        }
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
