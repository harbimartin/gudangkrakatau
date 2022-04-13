<?php

namespace App;
/**
 * Column : id, m_item_group_id, m_attribute_id,  sequence, status, created_at, updated_at
 */
class MasterItemGroupSku extends AList{
    public $table = 'm_item_group_skus';
    public $guarded = [ 'id' ];
    protected $sort_default = 'sequence';
    protected $date_default = 'sequence';
    protected $sortable = [
        'sequence'=>null,
        'created_at'=>null,
        'updated_at'=>null
    ];
    protected $searchable = [
        'sequence'=>0,
        'created_at'=>1,
        'updated_at'=>1
    ];

    public function attribute(){
        return $this->hasOne(MasterAttribute::class, 'id', 'm_attribute_id');
    }

    public function sibling(){
        return $this->hasMany(MasterItemGroupSku::class, 'm_item_group_id', 'm_item_group_id')->orderBy('sequence');
    }
    public function siblingr(){
        return $this->hasMany(MasterItemGroupSku::class, 'm_item_group_id', 'm_item_group_id')->orderBy('sequence', 'DESC');
    }
}
