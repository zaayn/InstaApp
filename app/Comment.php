<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // use Notifiable;
    protected $table = 'comment';
    protected $primaryKey = 'cid';
    protected $fillable = [
        'pid'
       ,'id'
       ,'comments' 
       ,
   ];

    public function post()
    {
        return $this->belongsTo(\App\Post::class,'pid');
    }
    public function user()
    {
        return $this->belongsTo(\App\User::class,'id');
    }
}
