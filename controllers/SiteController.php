<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\helpers\Url;
use backend\models\Product;
use backend\models\ProductSearch;
use yii\data\Pagination;
use backend\models\PasswordResetRequestForm;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','logout','request-password-reset','captcha'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','logout','request-password-reset'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
			'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',                
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
      public function actionIndex()
		{
		if(!isset(Yii::$app->session['customerparams']['per-page']))
		{
		Yii:$app->session['customerparams']['per-page'] = "10";
		}
		//$searchModel = new ProductSearch();
		//$productData = $searchModel->search(Yii::$app->request->queryParams);
		//$productData->pagination->pageSize=5;
		
		//$inventoryData = $searchModel->search(Yii::$app->request->queryParams);
		//$inventoryData->pagination->pageSize=5;




		return $this->render('index', [
		//'productData' => $productData,
		//'inventoryData' => $inventoryData,
		]);

		// return $this->render('index');
		}
    /**
     * Login action.
     *
     * @return string
     */


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return $this->goBack();
			return Yii::$app->response->redirect(Url::to(['site/index']));
        } else {
            $model->Admin_Password = '';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
	   public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->sendResetLink();


            // if ($model->sendResetLink()) {

            //     Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

            //     // return $this->goHome();
            // } else {
            //     Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            // }
        }

        return $this->render('requestPasswordResetLink', [
            'model' => $model,
        ]);
    }
}
