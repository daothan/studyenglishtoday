<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="comments";
    protected $fillable=['id','article_id','article_name','article_type','user_comment','comment'];
    public $timestamps = true;
}
