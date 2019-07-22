<?php

namespace app\models;

use Yii;

class Districts extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'districts';
    }

    public function rules()
    {
        return [
            [['id', 'zip_code', 'name_th', 'name_en'], 'required'],
            [['zip_code', 'amphure_id'], 'integer'],
            [['id'], 'string', 'max' => 6],
            [['name_th', 'name_en'], 'string', 'max' => 150],
            [['id'], 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'zip_code' => 'Zip Code',
            'name_th' => 'แขวง/ตำบล',
            'name_en' => 'District',
            'amphure_id' => 'Amphure ID',
        ];
    }
}
