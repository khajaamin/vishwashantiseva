<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SuccessStories;

/**
 * SuccessStoriesSearch represents the model behind the search form about `common\models\SuccessStories`.
 */
class SuccessStoriesSearch extends SuccessStories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'groom_id', 'bride_id', 'mobile'], 'integer'],
            [['marriage_of_this_groom', 'setteled_with_this_bride', 'email', 'city', 'marriage_date', 'success_story'], 'safe'],
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
        $query = SuccessStories::find();

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
            'groom_id' => $this->groom_id,
            'bride_id' => $this->bride_id,
            'mobile' => $this->mobile,
            'marriage_date' => $this->marriage_date,
        ]);

        $query->andFilterWhere(['like', 'marriage_of_this_groom', $this->marriage_of_this_groom])
            ->andFilterWhere(['like', 'setteled_with_this_bride', $this->setteled_with_this_bride])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'success_story', $this->success_story]);

        return $dataProvider;
    }
}
