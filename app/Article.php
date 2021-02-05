<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
     protected $fillable = [
        'id',
        'admin_id',
        'title',
        'content',
        'category',
        'homework_flag',
        'homework',
        'subject',
        'created_at'
    ];
    
    
public function user_id(){
    return $this->hasmany('App\Homework');
}
public function group_by( $table, $key)
{
    $groups = [];
    foreach ($table as $row) {
        $groups[$row[$key]][] = $row;
    }
    return $groups;
}

}
