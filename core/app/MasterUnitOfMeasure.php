<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Column : id, code, desc, status, group_id, created_at, updated_at
 */
class MasterUnitOfMeasure extends AList{
    public $table = 'm_unit_measures';
    public $guarded = [];
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
    protected $sortable = [
        'code'=>null,
        'status'=>null,
        'decimal'=>null,
        'created_at'=>null,
        'updated_at'=>null
    ];
    protected $searchable = [
        'code'=>0,
        'status'=>1,
        'desc'=>1,
        'decimal'=>1
    ];
}
