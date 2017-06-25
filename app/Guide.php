<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $table='guides';
    protected $fillable = ['id','tittle','content'];
    public $timestamps=true;
}
