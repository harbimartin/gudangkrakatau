<?php

namespace App;


/**
 * Column : id, name,desc,panjang,lebar,tinggi,m_gudang_id,status, created_at, updated_at
 */

class GudangArea extends AList{
    //
    public $table = 'm_gudang_areas';
    public $guarded = [];
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
}
