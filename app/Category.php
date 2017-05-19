<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id', 'name', 'alias', 'order', 'parent_id', 'keywords', 'description'];

    public $timestamps = true;

    public function detail(){
    	return $this -> hasMany('App\Detail');
    }
}
