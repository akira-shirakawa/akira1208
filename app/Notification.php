<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public static function do_notification_public($notification){
       
        $pablic =[];
        foreach($notification as $key){
            if($key->flag == 1){
                $pablic[] = $key;
            }
        }
        return $pablic;
    }
}
