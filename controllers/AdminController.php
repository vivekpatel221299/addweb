<?php

namespace backend\controllers;

use Yii;
use backend\models\Admin;
use backend\models\AdminSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Admin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
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
     * Displays a single Admin model.
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
     * Creates a new Admin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Admin();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->Admin_ID]);
			return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Admin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->Admin_ID]);
			return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Admin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	public function actionChangepassword($id)
 {	
		
		
	$model = $this->findModel($id);
	$model->setScenario('changePwd');

	 if(isset($_POST['Admin'])){
			
		$model->attributes = $_POST['Admin'];
		$valid = $model->validate();
				
		if(1 == Yii::$app->security->validatePassword($_REQUEST['Admin']['old_password'],$model->Admin_Password))
		{			
		  $model->Admin_Password =Yii::$app->security->generatePasswordHash($model->new_password); //md5($model->new_password);
		  $model->save(false);
		  $Errors = $model->getErrors();
				
		/*  if($model->save())
			 $msg ='Successfully changed password.';
		  else
			 $msg ='Password not changed.'; */
			 
			  if(empty($Errors))
				{
					/*$msg ='Successfully changed password.';
					
						$model = $this->findModel($id);
						$session = Yii::$app->session;
						$session->set('myError', $msg);
							return $this->render('changepassword', [
							'model' => $model,
						]);*/
						
						Yii::$app->user->logout();
						return $this->goHome();
				}
				else{
					$msg ='Please try again.';			 
					$model = $this->findModel($id);
					$session = Yii::$app->session;
					$session->set('myError', $msg);
						return $this->render('changepassword', [
						'model' => $model,
					]);
					
				}
			}
			else
			{
				$msg ='Please enter valid old password.';			 							 
				$model = $this->findModel($id);
				$session = Yii::$app->session;
				$session->set('myError', $msg);
				return $this->render('changepassword', [
					'model' => $model,
				]);
				
			}
		}
		else
		{
			return $this->render('changepassword', [
                'model' => $model,
            ]);
		}	
//$this->render('changepassword',array('model'=>$model));	
	}
}
