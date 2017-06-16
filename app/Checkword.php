<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkword extends Model
{
    protected $table='checkwords';
    protected $fillable=['id','text'];

    public $timestamps = true;
}
