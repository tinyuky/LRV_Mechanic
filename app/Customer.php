<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['name', 'email', 'gender', 'phone','content','date', 'created_at', 'updated_at'];
}
