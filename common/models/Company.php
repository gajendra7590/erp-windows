<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $owner
 * @property string|null $logo
 * @property string|null $about_company
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $address
 * @property string|null $social_fb
 * @property string|null $social_linkedin
 * @property string|null $social_instagram
 * @property string|null $social_twitter
 * @property string|null $social_pinterest
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Company extends \yii\db\ActiveRecord
{
    public $upload_image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'owner', 'email', 'phone','address'], 'required'],
            [['email'], 'email'],
            [['about_company'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'owner', 'logo', 'address'], 'string', 'max' => 256],
            [['phone'], 'string', 'max' => 12],
            [['email', 'social_fb', 'social_linkedin', 'social_instagram', 'social_twitter', 'social_pinterest'], 'string', 'max' => 100],
            [['upload_image'], 'file', 'extensions' => 'png,jpg,jpeg','skipOnEmpty' => true,'wrongExtension'=>'{extensions} files only',],
            [['upload_image'], 'string', 'max' => 256],
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
            'owner' => 'Owner',
            'logo' => 'Logo',
            'about_company' => 'About Company',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'social_fb' => 'Social Fb',
            'social_linkedin' => 'Social Linkedin',
            'social_instagram' => 'Social Instagram',
            'social_twitter' => 'Social Twitter',
            'social_pinterest' => 'Social Pinterest',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
