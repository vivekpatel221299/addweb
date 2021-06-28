<?php

namespace backend\controllers;

use Yii;
use backend\models\TblShortlink;
use backend\models\TblShortlinkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\AccessRule;
use common\models\User;
use yii\filters\AccessControl;
use yii\helpers\Html;
/**
 * TblShortlinkController implements the CRUD actions for TblShortlink model.
 */
class TblShortlinkController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
             'access' => [
                    'class' => AccessControl::className(),
                    // We will override the default rule config with the new AccessRule class
                    'ruleConfig' => [
                        'class' => AccessRule::className(),
                    ],
                    'only' => ['create', 'update', 'delete', 'index', 'view'],
                    'rules' => [
                        [
                            'actions' => ['index'],
                            'allow' => true,
                            // Allow admins to delete
                            'roles' => [
                                User::ROLE_ADMIN,
                            ],
                        ],
                        [
                            'actions' => ['create'],
                            'allow' => true,
                            // Allow users, moderators and admins to create
                            'roles' => [
                                User::ROLE_ADMIN,
                            ],
                        ],
                        [
                            'actions' => ['update'],
                            'allow' => true,
                            // Allow moderators and admins to update
                            'roles' => [
                                User::ROLE_ADMIN,
                            ],
                        ],
                        [
                            'actions' => ['delete'],
                            'allow' => true,
                            // Allow admins to delete
                            'roles' => [
                                User::ROLE_ADMIN,
                            ],
                        ],
                        [
                            'actions' => ['view'],
                            'allow' => true,
                            // Allow admins to delete
                            'roles' => [
                                User::ROLE_ADMIN,
                            ],
                        ],
                    ],
                ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblShortlink models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblShortlinkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		/*Pagination, per page & search param store in memory and ressign when index is reloaded*/
		$params = Yii::$app->request->queryParams;		
		if (count($params) <= 1) 
		{
			$params = Yii::$app->session['customerparams'];
			if(isset(Yii::$app->session['customerparams']['page']))
				$_GET['page'] = Yii::$app->session['customerparams']['page'];
			if(isset(Yii::$app->session['customerparams']['per-page']))
				$_GET['per-page'] = Yii::$app->session['customerparams']['per-page'];	
		} 
		else 
		{
			Yii::$app->session['customerparams'] = $params;
		}
		$dataProvider = $searchModel->search($params);	
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblShortlink model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblShortlink model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
        public function actionCreate()
    {
        $model = new TblShortlink();

        if ($model->load(Yii::$app->request->post()) )
		{
			
		    if($model->validate())
			{
				$model->code = $this->generateRandomString(8);
				$model->save(false);
				return $this->redirect(['view', 'id' => $model->id]);
			}
			else
			{
				$data = Html::errorSummary($model);
				Yii::$app->session->setFlash('message',$data);//
				return $this->render('create', [
                'model' => $model,
				]);
			}
        }
		else
		{
			return $this->render('create', [
				'model' => $model,
			]);
		}
    }

    /**
     * Updates an existing TblShortlink model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) 
		{
		    if($model->validate())
			{
				$model->save(false);
				return $this->redirect(['view', 'id' => $model->id]);
			}
			else
			{
				$data = Html::errorSummary($model);
				Yii::$app->session->setFlash('message',$data);//
				return $this->render('update', [
                'model' => $model,
				]);
			}
        }
		else
		{
        return $this->render('update', [
            'model' => $model,
        ]);
		}
    }

    /**
     * Deletes an existing TblShortlink model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
		
	public function generateRandomString($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++)
		{
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	
    /**
     * Finds the TblShortlink model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblShortlink the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblShortlink::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
