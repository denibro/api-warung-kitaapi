<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['name','price','quantity','active','desctiption'];
}