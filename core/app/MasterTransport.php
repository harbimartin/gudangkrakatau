<?php

namespace App;

class MasterTransport extends AList{
    public $table = 'm_transports';
    public $guarded = [];
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
}
