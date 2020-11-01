<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // use Notifiable;
    protected $table = 'post';
    protected $primaryKey = 'pid';
    protected $fillable = [
        'id'
       ,'image' 
       ,'caption'
       ,'like'
       ,
   ];

    public function user()
    {
        return $this->belongsTo(\App\User::class,'id');
    }
    public function post()
    {
        return $this->hasMany(Comment::class);
    }
}
