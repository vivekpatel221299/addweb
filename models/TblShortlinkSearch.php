<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblShortlink;

/**
 * TblShortlinkSearch represents the model behind the search form of `backend\models\TblShortlink`.
 */
class TblShortlinkSearch extends TblShortlink
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['oringnal_link', 'code', 'insertdate'], 'safe'],
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
        $query = TblShortlink::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination' => [ 'pageSize' => Yii::$app->session['customerparams']['per-page'] ],
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
            'insertdate' => $this->insertdate,
        ]);

        $query->andFilterWhere(['like', 'oringnal_link', $this->oringnal_link])
            ->andFilterWhere(['like', 'code', $this->code]);
		$query->orderby('id DESC');
        return $dataProvider;
    }
}
