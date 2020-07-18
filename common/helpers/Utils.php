<?php
namespace common\helpers;

use Yii;

class Utils
{
    public static function getUser($user_type = '')
    { 
        switch ($user_type) {
            case "1":
                return "Admin";
                break;
            case "2":
                return "Client";
                break;
            case "3":
                return "Vendor";
                break;
            default:
                return "Client";
        }

    }

    public static function getShortString($string){
        $newString = '';
        if($string!=''){
            $words = explode(" ", $string);
            foreach ($words as $w) {
                $newString .= $w[0];
            }
            $newString = strtoupper($newString);
        }
        return $newString;
    }

    public static function getUserShortName($user_object = null){
        if(!$user_object){ return ''; }
        else{
            $user_name = '';
            if($user_object->first_name!=''){
                ($user_object->first_name!='')?$user_name.=substr( $user_object->first_name,0,1):'';
                ($user_object->last_name!='')?$user_name.=substr( $user_object->last_name,0,1):'';
            }else{
                ($user_object->username!='')?$user_name.=substr( $user_object->username,0,1):'';
            } 
            return strtoupper($user_name);
        }
    }

    public static function getUserName($user_object = null){
        if(!$user_object){ return ''; }
        else{
            $user_name = '';
            if($user_object->first_name!=''){
                 $user_name.= $user_object->first_name.' '.$user_object->last_name;
            }else{
                $user_name.= $user_object->username;
            } 
            return ucfirst(trim($user_name));
        }
    }

    public static function getUniqueFileName()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    public static function get_ipAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){ 
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ 
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
   
    public static function TaostrWidget(){
        return \diecoding\toastr\ToastrFlash::widget([
            'options' => [
                "closeButton" => true,
                "newestOnTop" => true,
                "progressBar" => false, 
                "showDuration" => "300", 
                "hideDuration" => "1000",
                "timeOut" => "5000",
                "extendedTimeOut" => "1000",
                "showEasing" => "swing",
                "hideEasing" => "linear",
                "closeEasing" => "linear",
                "showMethod" => "slideDown",
                "hideMethod" => "slideUp",
                "closeMethod" => "slideUp"
            ]
        ]);
    }

    public static function IMG_URL( $base_prefix ){
        $domain = $_SERVER['SERVER_NAME'];
        $url = '/';
        switch ($domain) {
            case "localhost":
                $url = "http://localhost/easyerp-php";
                break;
            case "127.0.0.1":
                $url = "http://127.0.0.1/easyerp-php";
                break;
            case "61.246.140.190":
                $url = "http://61.246.140.190/easyerp-php";
                break;
            default:
                $url = $domain;
        }
        return  $url.'/'.$base_prefix;
    }

    public static function cc($code = 'usd'){
        $code = strtolower($code);
        switch ($code) {
            case "usd":
                return "$";
                break;
            case "inr":
                return "₹";
                break;
            case "eur":
                return "€";
                break;
            case "gbp":
                return "£";
                break;
            default:
                return "$";
        }

    }

    public static function variablePrice($array){
        if(!$array){
            return '--';
        }else{
            if($array['MinSP'] == $array['MaxSP']){
                return '$0.00 - $'.number_format($array['MaxSP'],2);
            }else{
                return '$'.number_format($array['MinSP'],2).' - '.number_format($array['MaxSP'],2) ;
            }
        }
    }

    //Get Variable Price With Object
    public static function variablePriceObj($obj){
        if($obj == null){
            return '--';
        }else{
            if($obj->MinSP == $obj->MaxSP){
                return '$0.00 - $'.number_format($obj->MaxSP,2);
            }else{
                return '$'.number_format($obj->MinSP,2).' - $'.number_format($obj->MaxSP,2) ;
            }
        }
    }
    
}