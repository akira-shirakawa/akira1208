<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
  
        
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function question(){
        return $this->belongsTo('App\Question');
    }
    
    public static function tentimes($array){
        foreach($array as $key){
            $key['point'] *=10;
        }
        return $array;
    }
    public static function marge($array,$array2){
       $array_new =[];
       $array_new2=[];
       foreach($array as $key){
           $tmp=[];
           $tmp['user_id'] = $key->user_id;
           $tmp['point'] = $key->point;
           $array_new[] = $tmp;
       }
       foreach($array2 as $key){
           $tmp =[];
           $tmp['user_id'] = $key->user_id;
           $tmp['point'] = $key->point;
           $array_new2[] = $tmp;
       }
        $tmp_array =[];
        $tmp_array2 =[];
        $and =[];
        $no_and =[];
        $result = [];
        foreach($array as $key){
            $tmp_array[] = $key->user_id;
        }
        foreach($array2 as $key){
            $tmp_array2[] = $key->user_id;
        }
       $and = array_intersect($tmp_array,$tmp_array2);//重複している価
       $no_and = array_merge($tmp_array,$tmp_array2);
       $no_and = array_unique($no_and);
       $no_and = array_diff($no_and,$and);//重複していない値[1,3,4,5,]
       //dd([$and,$no_and]); 
       //log or question - log and question
     foreach($no_and as $key){              //log
         if(array_search($key, array_column($array_new, 'user_id')) || array_search($key, array_column($array_new, 'user_id')) == 0 ){
              $index = array_search($key, array_column($array_new, 'user_id'));
              $result[] = $array_new[$index];         
          }else{
             
             $index = array_search($key, array_column($array_new2, 'user_id'));
             $result[] = $array_new2[$index];
             
         }
     }
     
     foreach ($and as $key){
          $tmp =[];
          $index = array_search($key, array_column($array_new, 'user_id'));
          $index2 = array_search($key, array_column($array_new2, 'user_id'));
          $point = $array_new[$index]['point']+$array_new2[$index2]['point'];
          $tmp['user_id'] = $key;
          $tmp['point'] = $point;
          $result[] = $tmp;
     }
     
    foreach ( $result as $key => $value) {
        $sort[$key] = $value['point'];
    }
    
    array_multisort($sort, SORT_DESC, $result);     
       return $result;
       
        
        
       
    }
}
