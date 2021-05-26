<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log2 extends Model
{
       protected $fillable = [
        'id',
        'user_id',
        'question_id',
        'created_at'
    ];
}
