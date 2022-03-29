<?php

namespace App;
/**
 * Column : id, panjang,lebar,tinggi,m_item_id,m_uom_id,status, created_at, updated_at
 */
class ItemVariantDimensions extends AList{
    public $tables = 'm_variant_dimensions';
    public $guarded = [];
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
    protected $sortable = [
        'lebar'=> null,
        'tinggi'=> null,
        'status'=> null,
        'created_at'=>null,
        'updated_at'=>null
    ];
    protected $filterable = [
        'lebar'=> 0,
        'tinggi'=> 1,
        'status'=> 1,
        'created_at'=>1,
        'updated_at'=>1
    ];
}
