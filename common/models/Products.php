<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\User;
use common\models\ProductsVarsRows;
use common\models\ProductsMedia;
use common\models\ProductsCategories;
use common\models\ProductsOtherInfo;
use common\models\ProductsReviews;


/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $product_categories
 * @property string $product_variables
 * @property string $title
 * @property string $slug
 * @property string $short_desc
 * @property string $description
 * @property string $featured_image
 * @property int $product_regular_price
 * @property int $product_sale_price
 * @property int $product_type
 * @property int|null stock_status
 * @property int|null stock_quantity
 * @property int $is_featured
 * @property int $user_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 *
 * @property User $user
 * @property ProductsMedia $productMedia
 * @property ProductsOtherInfo $productsOtherInfo
 * @property ProductsReviews $productsReviews
 */
class Products extends ActiveRecord
{
    public $fimage;
    public $categories;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'sku_code','short_desc', 'description', 'product_regular_price',
              'product_sale_price', 'product_type','is_featured'], 'required'],
            [['title', 'slug', 'featured_image'], 'string', 'max' => 256],
            [['product_regular_price', 'product_sale_price', 'product_type','is_featured','status','user_id'], 'integer'],
            [['created_at', 'updated_at','deleted_at'], 'safe'],
            [['description', 'short_desc','product_variables'], 'string'],
            [['stock_status', 'stock_quantity'], 'integer', 'max' => 11,],
            ['stock_status', 'default', 'value' => 1],
            ['stock_quantity', 'default', 'value' => 1],
            [['categories'],'required','message'=>'Choose atlies one category'],
            ['categories', 'each', 'rule' => ['integer']],
            [['fimage'], 'file', 'extensions' => 'png,jpg,jpeg','skipOnEmpty' => true, 'wrongExtension'=>'{extensions} files only',],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Product title',
            'sku_code' => 'SKU Code',
            'product_categories' => 'Product Categories',
            'product_variables' => 'Product Variables',
            'short_desc' => 'Short Description',
            'description' => 'Description',
            'featured_image' => 'Featured Image',
            'fimage' => 'Featured Image',
            'product_regular_price' => 'Regular Price',
            'product_sale_price' => 'Sale Price',
            'stock_status' => 'Stock Status',
            'stock_quantity' => 'Stock Quantity',
            'product_type' => 'Product Type',
            'is_featured' => 'Featured',
            'status' => 'Status',
            'user_id' => 'User ID',
            'created_at' => 'Created Date',
            'updated_at' => 'Updated Date',
            'deleted_at' => 'Deleted Date',
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getVariables()
    {
        return $this->hasMany(ProductsVarsRows::className(), ['product_id' => 'id']);
    }

    public function getVariablesPrice()
    {
        return $this->hasOne(ProductsVarsRows::className(), ['product_id' => 'id']);
    }

    public function getProductMedia()
    {
        return $this->hasMany(ProductsMedia::className(), ['product_id' => 'id']);
    }

    public function getProductsOtherInfo(){
        return $this->hasMany(ProductsOtherInfo::className(), ['product_id' => 'id']);
    }

    public function getProductsReviews()
    {
        return $this->hasOne(ProductsReviews::className(), ['product_id' => 'id']);
    }

    public function updateSlug(){
        $slug =  trim($this->title);
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '-', $slug);
        $slug = strtolower($slug);
        $this->slug = $slug;
    }
}
