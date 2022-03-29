<?php

namespace App;
/**
 * Column : id, name, desc, status, created_at, updated_at
 */
class MasterUnitGroup extends AList{
    public $table = 'm_unit_groups';
    public $guarded = [];
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
    protected $sortable = [
        'name'=>null,
        'status'=>null,
        'created_at'=>null,
        'updated_at'=>null
    ];
    protected $filterable = [
        'name'=>0,
        'status'=>1,
        'desc'=>1,
        'created_at'=>1,
        'updated_at'=>1
    ];
}