<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Social extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'socials';
    protected $fillable = [
    	'id', 'user_id', 'provider_user_id', 'provider'
    ];

    public $timestamps = true;

    public function user(){
    	return $this->belongsTo('App\User');
    }
}


