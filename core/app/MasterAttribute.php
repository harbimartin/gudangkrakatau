<?php

namespace App;
class MasterAttribute extends AList{
    public $table = 'm_attributes';
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
    public function uom_group(){
        return $this->hasOne(MasterUnitGroup::class, 'id', 'm_uom_group_id');
    }
}
