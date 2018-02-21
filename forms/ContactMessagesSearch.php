<?php

namespace domain\modules\contact\forms;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use domain\modules\contact\entities\ContactMessages;

/**
 * ContactMessagesSearch represents the model behind the search form of `domain\modules\contact\entities\ContactMessages`.
 */
class ContactMessagesSearch extends ContactMessages
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'status', 'region_id', 'subject_id'], 'integer'],
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
        $query = ContactMessages::find()->orderBy('created_at DESC');

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'region_id' => $this->region_id,
            'subject_id' => $this->subject_id,
        ]);

        return $dataProvider;
    }
}
