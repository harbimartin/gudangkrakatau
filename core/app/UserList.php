<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserList extends AList{
    public $table = 'users';
    public $guarded = [];
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
    protected $sortable = [
        'username'=>null,
        'name'=>null,
        'jabatan'=>null,
        'email'=>null,
        'status'=>null,
        'created_at'=>null,
        'updated_at'=>null
    ];
    protected $searchable = [
        'username'=>0,
        'name'=>1,
        'jabatan'=>1,
        'email'=>1,
        'status'=>1,
    ];
}
