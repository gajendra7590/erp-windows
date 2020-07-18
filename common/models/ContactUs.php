<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_us".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $mobile
 * @property string $message
 * @property string|null $reply_at
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class ContactUs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_us';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'mobile', 'message'], 'required'],
            ['email', 'email'],
            [['message'], 'string'],
            [['reply_at', 'created_at', 'updated_at'], 'safe'],
            [['name', 'email'], 'string', 'max' => 256],
            [['mobile'], 'string', 'max' => 12],
            ['mobile', 'ValidateMobile'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'mobile' => 'Phone Number',
            'message' => 'Message',
            'reply_at' => 'Reply At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    // Before Save/Update Set Default values
    public function beforeSave($insert) {
        if ($this->isNewRecord){
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
        }else{
            $this->updated_at = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }

    public function ValidateMobile($attribute, $params){
        if(!preg_match("/^[0-9]{10}$/", $this->mobile)) {
            $this->addError($attribute, 'Required valid 10 digit phone number');
        }
    }
}
