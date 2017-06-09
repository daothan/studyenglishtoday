<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable ;


class Detail extends Model
{
    use Searchable;
    public function searchableAs()
    {
        return ('search');
    }
    protected $table = 'details';
    protected $fillable = ['id','tittle', 'alias', 'type','image','image_path', 'introduce','content', 'user_id', 'cate_id'];

    public $timestamps = true;

    public function category(){
    	return $this -> belongTo('App\Category');
    }

    public function comment(){
        return $this -> hasMany('App\Comment');
    }

    public function user(){
    	return $this -> belongTo('App\User');
    }
}
