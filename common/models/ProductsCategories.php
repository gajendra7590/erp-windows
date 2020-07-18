<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_categories".
 *
 * @property int $id
 * @property string $category_name
 * @property string $category_slug
 * @property string|null $category_desc
 * @property string $category_img
 * @property int $status
 * @property int $featured
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class ProductsCategories extends \yii\db\ActiveRecord
{
    public $temp_image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_name', 'status'], 'required'],
            ['category_name', 'unique', 'targetClass' => '\common\models\ProductsCategories', 'message' => 'Category name already exist.'],
            [['category_desc'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['temp_image'], 'file', 'extensions' => 'png,jpg,jpeg','skipOnEmpty' => true,'wrongExtension'=>'{extensions} files only',],
            [['category_name', 'category_slug'], 'string', 'max' => 100],
            [['status','featured'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
            'category_slug' => 'Category Slug',
            'category_desc' =>  'Description',
            'temp_image' => 'Image',
            'status' => 'Status',
            'featured' => 'Featured',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    // Before Save/Update Set Default values
    public function beforeSave($insert) {
        $this->updateSlug();
        if ($this->isNewRecord){
            $this->created_at = date('Y-m-d H:i:s');
            $this->updated_at = date('Y-m-d H:i:s');
        }else{
            $this->updated_at = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }

    public function updateSlug(){
        $slug =  trim($this->category_name);
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '-', $slug);
        $slug = strtolower($slug);
        $this->category_slug = $slug;
    }


}
