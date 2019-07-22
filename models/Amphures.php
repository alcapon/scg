<?php

namespace app\models;

use Yii;

class Amphures extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'amphures';
    }

    public function rules()
    {
        return [
            [['code', 'name_th', 'name_en'], 'required'],
            [['province_id'], 'integer'],
            [['code'], 'string', 'max' => 4],
            [['name_th', 'name_en'], 'string', 'max' => 150],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name_th' => 'อำเภอ/เขต',
            'name_en' => 'Amphure',
            'province_id' => 'Province ID',
        ];
    }
}
