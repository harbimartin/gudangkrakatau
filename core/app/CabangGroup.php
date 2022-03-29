<?php

namespace App;

/**
 * Column : id, m_cabang_id,group_id,status, created_at, updated_at
 */
class CabangGroup extends AList{
    public $table = 'm_cabang_groups';
    public $guarded = [];
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
    protected $sortable = [
        'status'=>null,
        'created_at'=>null,
        'updated_at'=>null
    ];
    protected $filterable = [
        'status'=>0,
        'created_at'=>1,
        'updated_at'=>1
    ];
}
