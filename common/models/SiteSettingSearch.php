<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SiteSetting;

/**
 * SiteSettingSearch represents the model behind the search form about `common\models\SiteSetting`.
 */
class SiteSettingSearch extends SiteSetting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'contact_no'], 'integer'],
            [['name', 'email', 'salt', 'merchant_key', 'payment_url', 'smsurl'], 'safe'],
            [['price_control'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SiteSetting::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'contact_no' => $this->contact_no,
            'price_control' => $this->price_control,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'salt', $this->salt])
            ->andFilterWhere(['like', 'merchant_key', $this->merchant_key])
            ->andFilterWhere(['like', 'payment_url', $this->payment_url])
            ->andFilterWhere(['like', 'smsurl', $this->smsurl]);

        return $dataProvider;
    }
}
