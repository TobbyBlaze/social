<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //Table name
    protected $table = 'followers';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function followers()
    {
        return $this->belongsToMany('App\User');
    }

    

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followings()
    {
        return $this->belongsToMany('App\User');
    }
}