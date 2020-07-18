<?php

namespace common\helpers;

use Yii; 
use common\models\User;

class SendEmail
{
    //User Not Logged In And Payment Done Then Send Email After Create Account
    public static function CreateAccountAfterPayment($password ,$user){
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'NoLoginAccountCreate-html'],
                ['createdPassword' => $password,'user' => $user ]
            )
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['appName'] ])
            ->setTo($user->email)
            ->setSubject('Thank you for being a part of '.Yii::$app->params['appName'])
            ->send();
    }

    //After Payment Done and Order Booked swnd email
    public static function OrderBookingConfirmation($orderData){
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'OrderConfirmEmail-html'],
                [
                    'orderData' => $orderData,
                ]
            )
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['appName'] ])
            ->setTo($orderData['user']['email'])
            ->setSubject('Order confirmation at '.Yii::$app->params['appName'])
            ->send();
    }

    //After Create new account send email
    public static function sendAccountVerificationLink($user){
        return Yii::$app
        ->mailer
        ->compose(
            ['html' => 'emailVerify-html'],
            ['user' => $user]
        )
        ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['appName']])
        ->setTo($user->email)
//        ->setTo('gajendra@bitcot.com')
        ->setSubject('Account email verification ' . Yii::$app->params['appName'])
        ->send();
    }

    //After Create new account send email
    public static function resetPasswordLinkSend($user){

        return Yii::$app
        ->mailer
        ->compose(
            ['html' => 'passwordResetToken-html'],
            ['user' => $user]
        )
        ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['appName']])
        ->setTo($user->email)
//        ->setTo('gajendra@bitcot.com')
        ->setSubject('Password reset for ' . Yii::$app->params['appName'])
        ->send();
    }

    //After Create new account send email
    public static function successfullyResetPassword($user){
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'successfullyResetPassword-html'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['appName']])
            ->setTo($user->email)
//            ->setTo('gajendra@bitcot.com')
            ->setSubject('Successfully Reset Password For ' . Yii::$app->params['appName'])
            ->send();
    }
     
}