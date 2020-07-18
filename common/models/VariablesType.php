<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "variables_type".
 *
 * @property int $id
 * @property string $vname
 * @property string|null $vdesc
 * @property int $vstatus
 * @property int $vdefault
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class VariablesType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'variables_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vname'], 'required'],
            [['vstatus','vdefault'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['vname', 'vdesc'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vname' => 'Variable Type Name',
            'vdesc' => 'Variable Type Description',
            'vdefault' => 'Default Selected',
            'vstatus' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getList($defaulOpt = false,$d = 'Filter by variable types'){
        $vtypes = self::find()->where(['vstatus' => '1'])->asArray()->all();
        $vl = array();
        if($defaulOpt == true){
            $vl[''] = $d;
        }
        foreach ($vtypes as $k => $v){
            $vl[$v['id'] ] = $v['vname'];
        }
        return $vl;
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
