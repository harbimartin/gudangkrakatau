<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Column : id, name,desc,status, created_at, updated_at
 */
class Asal extends AList{
    public $table = 'm_asals';
    public $guarded = [];
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
    protected $sortable = [
        'name'=>null,
        'desc'=>null,
        'status'=>null,
        'created_at'=>null,
        'updated_at'=>null
    ];
    protected $searchable = [
        'name'=>0,
        'status'=>1,
        'desc'=>1,
        'created_at'=>1,
        'updated_at'=>1
    ];
}
