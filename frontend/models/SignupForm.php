<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\helpers\SendEmail;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['first_name', 'trim'],
            ['first_name', 'required'],
            ['first_name', 'string', 'max' => 50],
            ['last_name', 'trim'],
            ['last_name', 'required'],
            ['last_name', 'string', 'max' => 50],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return ( $user->save() ) && ( SendEmail::sendAccountVerificationLink($user) );

    }
}
