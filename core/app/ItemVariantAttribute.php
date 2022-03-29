<?php

namespace App;
/**
 * Column : id, m_item_id,m_attribute_id,m_uom_id,status, created_at, updated_at
 */


class ItemVariantAttribute extends AList{
    public $tables = 'm_item_variant_attributes';
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
    protected $filterable = [
        'name'=>0,
        'status'=>1,
        'desc'=>1,
        'created_at'=>1,
        'updated_at'=>1
    ];
}
