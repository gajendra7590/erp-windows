<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_orders_status".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $title
 * @property string $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class ProductsOrdersStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_orders_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status','name'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'title'], 'string', 'max' => 100],
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
            'title' => 'Title',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getAllStatusDropDown($is_default = false,$default_opt = 'Please choose status'){
        $get = self::find()->select('id,name')->asArray()->all();
        $new_array = array();
        if($is_default){
            $new_array[0] = $default_opt;
        }
        foreach ($get as $k => $item){
            $new_array[$item['id']] = $item['name'];
        }
        return $new_array;
    }


    public function beforeSave($insert) {
        if ($this->isNewRecord){
            $this->created_at = date('Y-m-d H:i:s');
        }else{
            $this->updated_at = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }
}
