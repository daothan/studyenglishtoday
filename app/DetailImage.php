<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailImage extends Model
{
    protected $table = 'detail_images';
    protected $fillable = ['id', 'images', 'detail_id'];

    public $timestamps = false;

    public function detail(){
    	return $this -> belongTo('App\Detail');
    }
}
