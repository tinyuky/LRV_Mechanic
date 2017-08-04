<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class branches extends Model
{
    protected $table = 'branches';
    protected $fillable = ['name', 'created_at', 'updated_at'];
    public function categories(){
      return $this->belongsToMany('App\categories','branchrelationship','branch_id','category_id');
    }
}
