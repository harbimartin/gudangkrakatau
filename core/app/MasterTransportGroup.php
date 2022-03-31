<?php

namespace App;

class MasterTransportGroup extends AList{
    public $table = 'm_transport_groups';
    public $guarded = [];
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
}
