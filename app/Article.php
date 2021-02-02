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
        'subject',
        'created_at'
    ];
    
    

public function group_by( $table, $key)
{
    $groups = [];
    foreach ($table as $row) {
        $groups[$row[$key]][] = $row;
    }
    return $groups;
}
public function dir($dir){
    preg_match('/\d*$/',$dir,$match);
    return $match[0];
}
}
