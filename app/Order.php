<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_no','user_id','total','status','other_id'];

    public function user(){
        return $this->hasMany('App\User','user_id');
    }

    public function topup(){
        return $this->belongsTo('App\Model\Topup','other_id');
    }

    public function produk(){
        return $this->belongsTo('App\Model\Produk','other_id');
    }
}
