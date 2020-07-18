<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products_vars_rows_items".
 *
 * @property int $id
 * @property int $row_id
 * @property int $var_type_id
 * @property string $value
 *
 * @property ProductsVarsRows $row
 * @property VariablesType $varType
 */
class ProductsVarsRowsItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_vars_rows_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['row_id', 'var_type_id', 'value'], 'required'],
            [['row_id', 'var_type_id'], 'integer'],
            [['value'], 'string', 'max' => 100],
            [['row_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsVarsRows::className(), 'targetAttribute' => ['row_id' => 'id']],
            [['var_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => VariablesType::className(), 'targetAttribute' => ['var_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'row_id' => 'Row ID',
            'var_type_id' => 'Var Type ID',
            'value' => 'Variable Value',
        ];
    }

    /**
     * Gets query for [[Row]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRow()
    {
        return $this->hasOne(ProductsVarsRows::className(), ['id' => 'row_id']);
    }

    /**
     * Gets query for [[VarType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVarType()
    {
        return $this->hasOne(VariablesType::className(), ['id' => 'var_type_id']);
    }
}
