<?php

namespace app\models;

use Yii;

class Provinces extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'provinces';
    }

    public function rules()
    {
        return [
            [['code', 'name_th', 'name_en'], 'required'],
            [['geography_id'], 'integer'],
            [['code'], 'string', 'max' => 2],
            [['name_th', 'name_en'], 'string', 'max' => 150],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name_th' => 'จังหวัด',
            'name_en' => 'Province',
            'geography_id' => 'Geography ID',
        ];
    }
}
