<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = ['id',
    'user_id',
    	'saakhi_id',
    'name',
    'comment',
    'approved',
 
]; 



    public function user()
    {
       return $this->belongsTo('App\User');
    }

    public function saakhi()
    {
       return $this->belongsTo('App\Saakhi');
    }

    public function replies(){
        return $this->hasMany('App\Reply');
    }

}
