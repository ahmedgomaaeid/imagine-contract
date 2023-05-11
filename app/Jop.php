<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jop extends Model
{
    protected $fillable = ['jop_text', 'worker_id'];
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
