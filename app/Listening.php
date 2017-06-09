<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Listening extends Model
{
    protected $table='listenings';
    protected $fillable = ['id', 'tittle', 'introduce','image','image_path','audio', 'audio_path','transcript',' user_id'];

    public $timestamps=true;


}
