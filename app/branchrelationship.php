<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class branchrelationship extends Model
{
    protected $table = 'branchrelationship';
    protected $fillable = ['branch_id','category_id', 'created_at', 'updated_at'];
    
}
