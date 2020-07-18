<?php
namespace frontend\models;
use Yii;
use yii\base\InvalidArgumentException;
use yii\base\Model;
use common\models\User;
use common\helpers\SendEmail;


/**
 * Password reset form
 */
class ChangePassword extends Model
{
    public $oldPassword;
    public $newPassword;
    public $cnewPassword;


    public function rules()
    {
        return [
            ['oldPassword', 'required'],
            ['newPassword', 'required'],
            ['cnewPassword', 'required'],
            ['cnewPassword', 'ValidateConfirmPassword'],
            [['oldPassword','newPassword','cnewPassword'], 'string', 'max' => 30],
            ['oldPassword', 'ValidateOldPassword'],
        ];
    }


    public function ValidateConfirmPassword($attribute, $params){
        if($this->newPassword != $this->cnewPassword){
            $this->addError($attribute, 'Password & confirm password not matched');
        }

    }

    public function ValidateOldPassword($attribute, $params)
    {
        $user_id = Yii::$app->user->identity->id;
        $user = User::findOne(['id'=>$user_id]);
        if ( ($user) && !$this->validatePassword($this->oldPassword,$user->password_hash) ){
            $this->addError($attribute, 'Old password is incorrect.');
        }
    }


    public function validatePassword($password,$current)
    {
        return Yii::$app->security->validatePassword($password, $current);
    }


    public function savePassword($password)
    {
        $user_id = Yii::$app->user->identity->id;
        $user = User::findOne(['id'=>$user_id]);
        if($user){
            $user->password_hash = Yii::$app->security->generatePasswordHash($password);
            if($user->save()){
                return true;
            }else{
                return false;
            }
        }
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();

        return ( $user->save(false) && SendEmail::successfullyResetPassword($user));
    }
}
