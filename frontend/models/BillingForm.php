<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Billing Form
 */
class BillingForm extends Model
{
    public $first_name;
    public $last_name;
    public $company_name;
    public $email;
    public $phone;
    public $password;
    public $country;
    public $state;
    public $city;
    public $zipcode;
    public $address_line_one;
    public $address_line_two;
    public $order_note;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name','email', 'phone',
              'country', 'state','city','zipcode','address_line_one'], 'required'],
            ['email', 'email'],
            ['email', 'UniqueEmailValidation'],
            [['company_name','address_line_two','order_note'], 'string', 'max' => 256],
        ];
    }


    public function UniqueEmailValidation($attribute, $params)
    {
        $user = NULL;
        if(Yii::$app->user->isGuest){
            $user = User::find()->where(['email' => $this->email])->one();
        }else{
            $user = User::find()
            ->where(['!=','email' , Yii::$app->user->identity->email])
            ->andWhere(['=','email',$this->email])
            ->one();
        }
        if($user){
            $this->addError($attribute, 'The email address is already been taken.');
        }
    }


}
