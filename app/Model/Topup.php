<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Topup extends Model
{
    protected $fillable = ['phone','value'];

    public function order(){
        return $this->hasMany('App\Order','other_id');
    }
}
