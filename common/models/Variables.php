<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "variables".
 *
 * @property int $id
 * @property int $type 1=>color,2=>size,3=>weight
 * @property string $name
 * @property string|null $color_code
 * @property string|null $description
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property VariablesType $variablesType
 */
class Variables extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'variables';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type','status'], 'integer'],
            [['name'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name', 'description','color_code'], 'string', 'max' => 256],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => VariablesType::className(), 'targetAttribute' => ['type' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Variable Type',
            'name' => 'Name',
            'color_code' => 'Color Code',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    public function getVariablesType(){
        return $this->hasOne(VariablesType::className(), ['id' => 'type']);
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
}
