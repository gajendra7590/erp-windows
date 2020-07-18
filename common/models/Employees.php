<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $gender
 * @property string|null $dob
 * @property string|null $address
 * @property string|null $profile_photo
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Employees extends \yii\db\ActiveRecord
{
    public $upload_image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'phone', 'gender','dob'], 'required'],
            [['dob', 'created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 12],
            [['gender'], 'string', 'max' => 5],
            [['address','profile_photo'], 'string', 'max' => 256],
            [['status'], 'integer'],
            [['upload_image'], 'file', 'extensions' => 'png,jpg,jpeg','skipOnEmpty' => true,'wrongExtension'=>'{extensions} files only',],
            [['phone'], 'string', 'max' => 256],
            ['phone','ValidatePhone'],
        ];
    }

    public function ValidatePhone($attribute, $params){
        if(!preg_match("/^[0-9]{10}$/", $this->phone)) {
            $this->addError($attribute, 'Required valid 10 digit phone number');
        }
    }

    // Before Save/Update Set Default values
    public function beforeSave($insert) {
        //var_dump( date('Y-m-d',strtotime($this->dob)));die;

        if($this->dob!=null){
            $this->dob = date('Y-m-d',strtotime($this->dob));
        }
        if ($this->isNewRecord){
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
        }else{
            $this->updated_at = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
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
            'email' => 'Email Address',
            'phone' => 'Phone',
            'gender' => 'Gender',
            'dob' => 'Date Of Birth',
            'address' => 'Address',
            'status' => 'Status',
            'upload_image' => 'Upload Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
