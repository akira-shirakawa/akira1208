<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function user_homework_has(){
        return $this->hasmany('App\Homework');
    }
 public function questions(){
    return $this->belongsToMany('App\Question', 'logs');     
 } 
 public function question2s(){
     return $this->belongsToMany('App\Question','log2s');
 }
 public static function get_title ($value){
     $result = [];
     foreach($value as $key){
         $result[] = $key->title;
     }
     $result = array_count_values($result);
    return $result; 
 }
 public static function get_rate($array1,$array2){
     $result =[];
     foreach($array1 as $key=>$value){
        $tmp = array_key_exists($key,$array2) ? $array2["$key"] :0.000001;
       $result["$key"] =  floor(($tmp/$value)*100);   
        
     }
    return $result; 
 }
 
 
}
