<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	use Sortable;
    protected $table = 'customer';
    protected $fillable = ['name', 'email', 'gender', 'phone','content','date', 'created_at', 'updated_at'];
    public $sortable = [
	                    'name',
	                    'email',
	                    'gender',
	                    'phone'];
}
