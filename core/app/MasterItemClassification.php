<?php

namespace App;
class MasterItemClassification extends AList{
    public $table = 'm_item_classifications';
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

    public function item(){
        return $this->hasMany(MasterItem::class, 'classification_id', 'id');
    }
}
