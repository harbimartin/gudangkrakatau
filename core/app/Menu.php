<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends AList{
    public $table = 'm_menus';
    public $guarded = [];
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
    protected $sortable = [
        'key'=>null,
        'name'=>null,
        'parent'=>null,
        'icon'=>null,
        'status'=>null,
        'created_at'=>null,
        'updated_at'=>null
    ];
    protected $searchable = [
        'key'=>0,
        'name'=>1,
        'parent'=>1,
        'icon'=>1,
        'status'=>1,
    ];
    /**
     * Get all of the parent for the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parent()
    {
        return $this->hasMany(Menu::class, 'parent');
    }
}
