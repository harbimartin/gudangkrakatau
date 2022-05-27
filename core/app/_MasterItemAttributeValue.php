<?php

namespace App;
/**
 * Column : id, value, code, m_attr_id, m_uom_id, created_at, updated_at
 */
class _MasterItemAttributeValue extends AList{
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
    public function item_attr(){
        return $this->hasMany(MasterItemAttribute::class, 'm_value_id', 'id');
    }
}
