<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
  use Sortable;
  protected $table = 'products';
  protected $fillable = ['title', 'price','content','category_id','branch_id','status','condition','created_at', 'updated_at'];
  public $sortable = [
    'title',
    'price',
    'content',
    ['category'=>'name'],
    ['branch'=>'name'],
    'status',
    'condition'];
    public function category()
    {
      return $this->hasOne('App\categories','id','category_id');
    }

    public function branch()
    {
      return $this->hasOne('App\branches','id','branch_id');
    }
    public function image(){
      return $this->hasMany('App\image','product_id','id');
    }
  }
