<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Admin;

/**
 * AdminSearch represents the model behind the search form of `backend\models\Admin`.
 */
class AdminSearch extends Admin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Admin_ID', 'centerID', 'dieticianID'], 'integer'],
            [['Admin_Name', 'Admin_Email', 'Admin_Mobile', 'Admin_Password', 'Admin_Type', 'Admin_Address', 'Admin_Status', 'Admin_Last_Login', 'Created_Date', 'Admin_Code_Reset_Password', 'Admin_Exp_CRP'], 'safe'],
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
        $query = Admin::find();

        // add conditions that should always apply here

        if(!isset(Yii::$app->session['customerparams']['per-page']))
		{
			
			$pagination =20;
		}
		else
		{
			$pagination = Yii::$app->session['customerparams']['per-page'];
		}
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination' => [ 'pageSize' => $pagination ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Admin_ID' => $this->Admin_ID,
            'centerID' => $this->centerID,
            'dieticianID' => $this->dieticianID,
            'Admin_Last_Login' => $this->Admin_Last_Login,
            'Created_Date' => $this->Created_Date,
            'Admin_Exp_CRP' => $this->Admin_Exp_CRP,
        ]);

        $query->andFilterWhere(['like', 'Admin_Name', $this->Admin_Name])
            ->andFilterWhere(['like', 'Admin_Email', $this->Admin_Email])
            ->andFilterWhere(['like', 'Admin_Mobile', $this->Admin_Mobile])
            ->andFilterWhere(['like', 'Admin_Password', $this->Admin_Password])
            ->andFilterWhere(['like', 'Admin_Type', $this->Admin_Type])
            ->andFilterWhere(['like', 'Admin_Address', $this->Admin_Address])
            ->andFilterWhere(['like', 'Admin_Status', $this->Admin_Status])
            ->andFilterWhere(['like', 'Admin_Code_Reset_Password', $this->Admin_Code_Reset_Password]);

        return $dataProvider;
    }
}
