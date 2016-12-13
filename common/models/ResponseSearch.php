<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Response;

/**
 * ResponseSearch represents the model behind the search form about `common\models\Response`.
 */
class ResponseSearch extends Response
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sender_id', 'receiver_id'], 'integer'],
            [['request_type', 'status'], 'safe'],
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
        $query = Response::find();

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
            'sender_id' => $this->sender_id,
            'receiver_id' => $this->receiver_id,
        ]);

        $query->andFilterWhere(['like', 'request_type', $this->request_type])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
