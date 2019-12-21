<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    //Table name
    protected $table = 'comments';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function post(){
        return $this->belongsTo('App\Post');
    }

    // protected $fillable = [
    //     'body',
    //     'user_id',
    // ];

    // protected $casts = [
    //     'user_id' => 'integer',
    // ];

    // public function author()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }
}
