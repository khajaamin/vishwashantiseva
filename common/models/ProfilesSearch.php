<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Profiles;

/**
 * ProfilesSearch represents the model behind the search form about `common\models\Profiles`.
 */
class ProfilesSearch extends Profiles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id','mobile', 'charan', 'brothers', 'sisters', 'expected_min_age', 'expected_max_age'], 'integer'],
            [['name', 'profile_image', 'date_of_birth', 'marital_status', 'gender', 'country', 'state', 'city', 'blood_group', 'complextion', 'built', 'religion', 'caste', 'sub_caste', 'diet', 'birthplace', 'birthtime', 'rashi', 'nakshatra', 'nadi', 'gan', 'gotra', 'education', 'occupation', 'income', 'father', 'mother', 'expected_caste', 'expected_education', 'expected_occupation'], 'safe'],
            [['height','weight', 'expected_min_height', 'expected_max_height'], 'number'],
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
        $query = Profiles::find();

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
            'user_id' => $this->user_id,
            'mobile' => $this->mobile,
            'height' => $this->height,
            'weight' => $this->weight,
            'birthtime' => $this->birthtime,
            'charan' => $this->charan,
            'brothers' => $this->brothers,
            'sisters' => $this->sisters,
            'expected_min_age' => $this->expected_min_age,
            'expected_max_age' => $this->expected_max_age,
            'expected_min_height' => $this->expected_min_height,
            'expected_max_height' => $this->expected_max_height,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'profile_image', $this->profile_image])
            ->andFilterWhere(['like', 'date_of_birth', $this->date_of_birth])
            ->andFilterWhere(['like', 'marital_status', $this->marital_status])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'blood_group', $this->blood_group])
            ->andFilterWhere(['like', 'complextion', $this->complextion])
            ->andFilterWhere(['like', 'built', $this->built])
            ->andFilterWhere(['like', 'religion', $this->religion])
            ->andFilterWhere(['like', 'caste', $this->caste])
            ->andFilterWhere(['like', 'sub_caste', $this->sub_caste])
            ->andFilterWhere(['like', 'diet', $this->diet])
            ->andFilterWhere(['like', 'birthplace', $this->birthplace])
            ->andFilterWhere(['like', 'rashi', $this->rashi])
            ->andFilterWhere(['like', 'nakshatra', $this->nakshatra])
            ->andFilterWhere(['like', 'nadi', $this->nadi])
            ->andFilterWhere(['like', 'gan', $this->gan])
            ->andFilterWhere(['like', 'gotra', $this->gotra])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'occupation', $this->occupation])
            ->andFilterWhere(['like', 'income', $this->income])
            ->andFilterWhere(['like', 'father', $this->father])
            ->andFilterWhere(['like', 'mother', $this->mother])
            ->andFilterWhere(['like', 'expected_caste', $this->expected_caste])
            ->andFilterWhere(['like', 'expected_education', $this->expected_education])
            ->andFilterWhere(['like', 'expected_occupation', $this->expected_occupation]);

        return $dataProvider;
    }
}
