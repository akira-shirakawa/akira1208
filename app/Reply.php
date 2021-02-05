<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable=[
        'user_id',
        'article_id',
        'statue',
        'comment',
        ];
        
        
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function atricle(){
        return $this->belongsTo('App\Article');
    }
}
