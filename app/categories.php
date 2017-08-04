<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class categories extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'created_at', 'updated_at'];
    public function branches(){
      return $this->belongsToMany('App\branches','branchrelationship','category_id','branch_id');
    }
}
