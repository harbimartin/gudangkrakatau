<?php

namespace App;

/**
 * Column : id, m_cabang_group_id,user_id,status, created_at, updated_at
 */
class CabangGroupMenu extends AList{
    public $table = 'm_cabang_group_menus';
    public $guarded = [];
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
}
