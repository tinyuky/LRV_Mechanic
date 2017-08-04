<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $table = 'images';
    protected $fillable = ['product_id', 'path', 'created_at', 'updated_at'];
}
