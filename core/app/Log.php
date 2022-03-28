<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Column : id, m_cabang_group_user_id, action, tables, id, time
 */
class Log extends AList{
    public $timestamps = false;
    protected $guarded = [];

}
