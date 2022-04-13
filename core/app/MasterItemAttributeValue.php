<?php

namespace App;
/**
 * Column : id, panjang,lebar,tinggi,m_item_id,m_uom_id,status, created_at, updated_at
 */
class MasterItemAttributeValue extends AList{
    public $table = 'm_item_attribute_values';
    public $guarded = [];
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
    protected $sortable = [
        'status'=> null,
        'created_at'=>null,
        'updated_at'=>null
    ];
    protected $searchable = [
        'status'=> 1,
        'created_at'=>1,
        'updated_at'=>1
    ];
}
