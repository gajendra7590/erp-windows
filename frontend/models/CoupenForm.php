<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Billing Form
 */
class CoupenForm extends Model
{
    public $coupen_code;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['coupen_code', 'required', 'message' => 'Enter coupen code'],
            ['coupen_code', 'ValidateCoupenCode'],
        ];
    }


    public function ValidateCoupenCode($attribute, $params)
    {
//        $user = NULL;
//        if(Yii::$app->user->isGuest){
//            $user = User::find()->where(['email' => $this->email])->one();
//        }else{
//            $user = User::find()
//                ->where(['!=','email' , Yii::$app->user->identity->email])
//                ->andWhere(['=','email',$this->email])
//                ->one();
//        }
//        if($user){
//            $this->addError($attribute, 'The email address is already been taken.');
//        }
    }


}
