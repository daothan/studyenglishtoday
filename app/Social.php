<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{

	protected $table = 'socials';
    protected $fillable = [
    	'id', 'user_id', 'provider_user_id', 'provider'
    ];

    public $timestamps = true;

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
