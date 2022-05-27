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
    protected $append = ['state'];

    public function group(){
        return $this->hasOne(MasterItemGroup::class, 'id', 'group_id');
    }
    public function classification(){
        return $this->hasMany(MasterItemClassification::class, 'id', 'classification_id');
    }
    public function sku(){
        return $this->hasMany(MasterItemGroupSku::class, 'm_item_group_id', 'group_id')->select('code')->leftJoin('m_item_attributes', function($q){
            return $q->on('m_item_attributes.m_attr_id', 'm_attribute_id');
        })->leftJoin('m_attribute_values', function($q){
            return $q->on('m_item_attributes.m_value_id', 'm_attribute_values.id');
        })->orderBy('sequence');
    }
    public function getHardSkuAttribute(){
        $sku = $this->hasMany(MasterItemGroupSku::class, 'm_item_group_id', 'group_id')->select('code')->leftJoin('m_item_attributes', function($q){
            return $q->on('m_item_attributes.m_attr_id', 'm_attribute_id');
        })->leftJoin('m_attribute_values', function($q){
            return $q->on('m_item_attributes.m_value_id', 'm_attribute_values.id');
        })->orderBy('sequence')->get();
        $t = '';
        foreach($sku as $s){
            $t.=$s['code'];
        }
        return $t;
    }
    public function getStateAttribute(){
        if ($this->status == 0)
            return 0;
        foreach($this->sku as $code){
            if ($code->code == null)
                return 1;
        }
        return 2;
    }
}
