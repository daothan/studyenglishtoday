<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="comments";
    protected $fillable=['id','article_type','article_name','user_comment','comment','article_id'];
    public $timestamps = true;

    public function detail(){
    	return $this -> belongTo('App\Detail');
    }
}
