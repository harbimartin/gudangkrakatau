<?php

namespace App;
/**
 * Column : m_item_id, m_attr_id, m_value_id
 */
class MasterItemAttribute extends AList{
    public $table = 'm_item_attributes';
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
    public function attribute(){
        return $this->hasOne(MasterAttribute::class, 'id', 'm_attr_id');
    }
    public function value(){
        return $this->hasOne(MasterAttributeValue::class, 'id', 'm_value_id');
    }
}
