<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'details';
    protected $fillable = ['id', 'tittle', 'alias', 'content', 'images', 'keywords', 'description', 'user_id', 'cate_id'];

    public $timestamps = false;

    public function category(){
    	$this -> belongTo('App\Category');
    }

    public function detailimage(){
    	$this -> hasMany('App\DetailImage');
    }

    public function user(){
    	$this -> belongTo('App\User');
    }
}
