<?php

namespace App;
/**
 * Column : id, name, code,  group_id, desc, status, created_at, updated_at
 */
class MasterTransport extends AList{
    public $table = 'm_transports';
    public $guarded = [];
    protected $sort_default = 'created_at';
    protected $date_default = 'created_at';
}
