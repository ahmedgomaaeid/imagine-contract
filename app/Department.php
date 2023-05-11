<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['sub_num', 'post_code', 'cable_start', 'hook', 'end_read', 'port_num', 'root_num', 'port_signal', 'box_signal', 'pre_spliter_signal', 'port_signal_m', 'use_spliter', 'type', 'total', 'worker_id', 'photos'];
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
