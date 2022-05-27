<?php

namespace App;
/**
 * Column : m_gudang_id, code,  m_transport_id, receive_by, note, supir, m_asal_id, receive_at
 */
class InboundHeader extends AList{
    public $table = 't_inbound_headers';
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

    public function gudang(){
        return $this->hasOne(Gudang::class, 'id', 'm_gudang_id');
    }
    public function transport(){
        return $this->hasOne(Gudang::class, 'id', 'm_transport_id');
    }
    public function receiver(){
        return $this->hasOne(User::class, 'id', 'receive_by');
    }
    public function asal(){
        return $this->hasOne(Asal::class, 'id', 'm_asal_id');
    }
}
