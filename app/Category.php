<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id', 'name', 'alias', 'order', 'parent_id', 'keywords', 'description'];

    //public $timestamps = false;

    public function detail(){
    	$this -> hasMany('App\Detail');
    }
}
