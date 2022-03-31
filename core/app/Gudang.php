<?php

namespace App;

/**
 * Column : id, name, kota, longitude, latitude, panjang, lebar, tinggi, kapasitas, status, created_at, updated_at
 */
class Gudang extends AList{
    public $guarded = [];
    protected $table = 'm_gudangs';
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
    protected $sortable = [
        'name' => null,
        'desc' => null,
        'kota' => null,
        'longitude' => null,
        'latitude' => null,
        'panjang' => null,
        'lebar' => null,
        'tinggi' => null,
        'kapasitas' => null,
        'status' => null,
        'created_at'=>null,
        'updated_at'=>null
    ];
    protected $searchable = [
        'name' => 0,
        'desc' => 1,
        'kota' => 1,
        'longitude' => 1,
        'latitude' => 1,
        'panjang' => 1,
        'lebar' => 1,
        'tinggi' => 1,
        'kapasitas' => 1,
        'status' => 1,
        'created_at'=>1,
        'updated_at'=>1
    ];
}
