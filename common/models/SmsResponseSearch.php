<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SmsResponse;

/**
 * SmsResponseSearch represents the model behind the search form about `common\models\SmsResponse`.
 */
class SmsResponseSearch extends SmsResponse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'number', 'part_id'], 'integer'],
            [['error_code', 'error_message', 'jobid', 'msg_id', 'message', 'send_on'], 'safe'],
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
        $query = SmsResponse::find();

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
            'number' => $this->number,
            'part_id' => $this->part_id,
            'send_on' => $this->send_on,
        ]);

        $query->andFilterWhere(['like', 'error_code', $this->error_code])
            ->andFilterWhere(['like', 'error_message', $this->error_message])
            ->andFilterWhere(['like', 'jobid', $this->jobid])
            ->andFilterWhere(['like', 'msg_id', $this->msg_id])
            ->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}
