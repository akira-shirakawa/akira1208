<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{  protected $fillable = [
   'question',
   'image',
   'option1',
   'option2',
   'option3',
   'option4', 
   'category',
   'title'];
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
   public static function return_sub($id){
      if($id == 1 ){
         return '英語';
      }else{
         return '古文単語';
      }
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
