<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $auth_key
 * @property string|null $phone
 * @property string|null $profile_photo
 * @property string|null $gender
 * @property string|null $dob
 * @property string|null $city
 * @property string|null $state
 * @property string|null $country
 * @property string|null $zip
 * @property int $role
 * @property string|null $ip_address
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $verification_token
 */
class ManageUsers extends ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    const ROLE_ADMIN = 1;
    const ROLE_CLIENT = 2;
    const ROLE_Vendor = 3;


    public $temp_image;
    public $password;
    public $update_password;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name','last_name','email'], 'required'],
            [['dob', 'created_at', 'updated_at'], 'safe'],
            [['role', 'status'], 'integer'],
            [['first_name', 'last_name', 'city', 'state', 'country'], 'string', 'max' => 50],
            ['email', 'email'],
            [['email', 'password_hash', 'password_reset_token', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 12],
            [['profile_photo'], 'string', 'max' => 256],
            [['gender', 'zip'], 'string', 'max' => 6],
            [['ip_address'], 'string', 'max' => 20],
            ['email', 'unique', 'targetClass' => '\common\models\ManageUsers', 'message' => 'Email is already been taken.'],
            [['password_reset_token'], 'unique'],
            ['password', 'required','message'=>'Please choose the password', 'on' => 'create'],
            ['update_password', 'string', 'min' => 6, 'message' => 'Password length should be atliest 6'],
            ['phone','ValidatePhone'],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            ['role', 'default', 'value' => self::ROLE_CLIENT],
            ['role', 'in', 'range' => [self::ROLE_CLIENT, self::ROLE_ADMIN,self::ROLE_Vendor]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'auth_key' => 'Auth Key',
            'phone' => 'Phone',
            'profile_photo' => 'Profile Photo',
            'gender' => 'Gender',
            'dob' => 'Dob',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'zip' => 'Zip',
            'role' => 'Role',
            'ip_address' => 'Ip Address',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'update_password' => 'Password',
        ];
    }

    public function ValidatePhone($attribute, $params){
        if($this->phone != ''){
            if(!preg_match("/^[0-9]{10}$/", $this->phone)) {
                $this->addError($attribute, 'Required valid 10 digit phone number');
            }
        }
    }

    public function beforeSave($insert) {
        if ($this->isNewRecord){
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
        }else{
            $this->updated_at = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function setUserRole($role = 2)
    {
        $this->role = $role;
    }
}
