<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model{
    public $table = 'm_menus';
    public $guarded = [];
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
