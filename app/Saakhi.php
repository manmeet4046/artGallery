<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saakhi extends Model
{
   protected $fillable = [
     'title', 'volume', 'issue','date','publisher','saakhi'
    ];

public function comments() 
    {
        return $this->hasMany('App\Comment');
    }
}
