<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Worker extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'email', 'password', 'description', 'start1', 'start2', 'start3', 'outer_price', 'inner_price', 'tranch_price', 'pipe_price', 'spliter_price'];
    public function tools()
    {
        return $this->hasMany('App\Tool');
    }
}
