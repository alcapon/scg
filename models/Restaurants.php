<?php

namespace app\models;

use Yii;

class Restaurants extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'restaurants';
    }

    public function rules()
    {
        return [
            [['name', 'district', 'amphure', 'province', 'keyword'], 'required'],
            [['district', 'amphure', 'province'], 'integer'],
            [['lat', 'lng', 'keyword'], 'string'],
            [['name'], 'string', 'max' => 80],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'district' => 'District',
            'amphure' => 'Amphure',
            'province' => 'Province',
            'keyword' => 'Keyword',
            'lat' => 'Lat',
            'lng' => 'Lng',
        ];
    }

    public function getProvinceName()
    {
        return $this->hasOne(Provinces::className(), ['id' => 'province']);
    }

    public function getAmphureName()
    {
        return $this->hasOne(Amphures::className(), ['id' => 'amphure']);
    }

    public function getDistrictName()
    {
        return $this->hasOne(Districts::className(), ['id' => 'district']);
    }
}
