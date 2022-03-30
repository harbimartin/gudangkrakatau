<?php

namespace App;
/**
 * Column : id, name, brand_id, group_id, classification_id, sku, desc, status, created_at, updated_at
 */
class MasterItem extends AList{
    public $table = 'm_items';
    public $guarded = [];
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
    protected $sortable = [
        'name'=>null,
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
