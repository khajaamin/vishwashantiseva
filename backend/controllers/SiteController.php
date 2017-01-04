<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\LoginForm;
use common\models\Profiles;
use common\models\Events;
use common\models\Sms;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','view','update','delete','logout'],
                'rules' => [
                    [
                        'actions' => ['index','create','view','update','delete','logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


public function beforeAction($action)
{            
    if ($action->id == 'sendsms' ) {
        $this->enableCsrfValidation = false;
    }
    return parent::beforeAction($action);
}


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $groom_count = Profiles::find()->where(['gender'=>'m'])->count();
        $bride_count = Profiles::find()->where(['gender'=>'f'])->count();

        $event_count = Events::find()->count();
        return $this->render('index',['groom_count' => $groom_count,'bride_count' => $bride_count,'event_count' => $event_count]);
    }

 
     public function actionSendsms()
    {   
        // if(isset($_GET['data'])){
        //     $data = $_GET['data'];
        //     $jsonData = json_decode($data);
        //     //print_r($jsonData);
        //     //echo 'success';
        //     return $this->render('send_sms',['model' =>$model,'jsonData'=>$jsonData]);
        // }
        $model =  new Sms();


         return $this->render('send_sms',['model' =>$model]);
    }


   /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout='nonav';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
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
}
