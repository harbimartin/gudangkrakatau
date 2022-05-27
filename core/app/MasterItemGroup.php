<?php

namespace App;
class MasterItemGroup extends AList{
    public $table = 'm_item_groups';
    public $guarded = [];
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
    protected $sortable = [
        'name'=>null,
        'code'=>null,
        'status'=>null,
        'created_at'=>null,
        'updated_at'=>null
    ];
    protected $searchable = [
        'name'=>0,
        'code'=>1,
        'status'=>1,
        'desc'=>1,
        'created_at'=>1,
        'updated_at'=>1
    ];

    public function sku(){
        return $this->hasMany(MasterItemGroupSku::class, 'm_item_group_id', 'id')->orderBy('sequence');
    }
    public function attr(){
        return $this->hasMany(MasterItemGroupSku::class, 'm_item_group_id', 'id')->select('m_item_group_id','name')->leftJoin('m_attributes', function($q){
            return $q->on('m_attributes.id', 'm_attribute_id');
        })->orderBy('sequence');
    }
}
