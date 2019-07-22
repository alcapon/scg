<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Restaurants;

class RestaurantsSearch extends Restaurants
{
    public $q;

    public function rules()
    {
        return [
            [['id', 'district', 'amphure', 'province'], 'integer'],
            [['name'], 'string', 'max' => 80],
            [['keyword', 'q'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Restaurants::find();
        $query->joinWith(['provinceName', 'amphureName', 'districtName']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'district' => $this->district,
            'amphure' => $this->amphure,
            'province' => $this->province,
        ]);

        $query->orFilterWhere(['like', 'name', $this->name]);
        $query->orFilterWhere(['like', 'name', $this->q]);
        $query->orFilterWhere(['like', 'keyword', $this->q]);
        $query->orFilterWhere(['like', 'provinces.name_en', $this->q]);
        $query->orFilterWhere(['like', 'amphures.name_en', $this->q]);
        $query->orFilterWhere(['like', 'districts.name_en', $this->q]);
        $query->orFilterWhere(['like', 'provinces.name_th', $this->q]);
        $query->orFilterWhere(['like', 'amphures.name_th', $this->q]);
        $query->orFilterWhere(['like', 'districts.name_th', $this->q]);

        return $dataProvider;
    }
}
