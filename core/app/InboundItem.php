<?php

namespace App;
/**
 * Column : id, t_inbound_header_id, m_item_id, quantity, note, created_at, updated_at
 */
class InboundItem extends AList{
    public $table = 't_inbound_items';
    public $guarded = [ 'id' ];
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
    public function item(){
        return $this->hasOne(MasterItem::class, 'id', 'm_item_id');
    }
    public function group(){
        return $this->hasOne(MasterItemGroup::class, 'id', 'm_item_id');
    }
    public function classification(){
        return $this->hasOne(MasterItemClassification::class, 'id', 'classification_id');
    }
    public function sku(){
        return $this->hasMany(MasterItemGroupSku::class, 'm_item_group_id', 'group_id')->select('code')->leftJoin('m_item_attributes', function($q){
            return $q->on('m_item_attributes.m_attr_id', 'm_attribute_id');
        })->leftJoin('m_attribute_values', function($q){
            return $q->on('m_item_attributes.m_value_id', 'm_attribute_values.id');
        })->orderBy('sequence');
    }
}
