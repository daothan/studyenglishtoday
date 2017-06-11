<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Textfile extends Model
{
    protected $table='textfiles';
    protected $fillable=['id','tittle','content'];
    public $timestamps = true;
}
