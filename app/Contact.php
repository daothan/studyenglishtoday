<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table='contacts';
    protected $fillable=['id','prior','address','phone','email','hour_week', 'hour_weekend'];
    public $timestamps =true;
}
