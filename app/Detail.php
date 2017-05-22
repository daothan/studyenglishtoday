<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'details';
    protected $fillable = ['id','tittle', 'alias', 'type', 'introduce','content', 'user_id', 'cate_id'];

    public $timestamps = true;

    public function category(){
    	return $this -> belongTo('App\Category');
    }

    public function detailimage(){
    	return $this -> hasMany('App\DetailImage');
    }

    public function user(){
    	return $this -> belongTo('App\User');
    }
}
