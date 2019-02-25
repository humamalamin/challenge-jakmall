<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['product','shipping_address','price'];
}
