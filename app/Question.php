<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
   public static function getUniqueArray($array, $column)
   {   
      $tmp = []; 
      $uniqueArray = []; 
      foreach ($array as $value){
         if (!in_array($value[$column], $tmp)) {
            $tmp[] = $value[$column];
            $uniqueArray[] = $value;
         }   
      }   
      return $uniqueArray;    
   }   
   
   public static function auto_fill($data,$count){
      $result =$count;
      $data2=[];
      foreach($data as $key){
         $tmp =trim($key);
         $data2[] = explode(',',$tmp);
      }
      
      while($result == $count){
         $num = count($data2)-1;
         $result = rand(0,$num);
              
      }
      return $data2[$result][2];
      
   }
}
