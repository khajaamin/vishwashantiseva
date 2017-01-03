<?php

namespace frontend\controllers;

use Yii;
use common\models\Events;
use common\models\User;
use common\models\EventsSearch;
use common\models\PaidForEvent;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * EventsController implements the CRUD actions for Events model.
 */
class EventsController extends Controller
{
    /**
     * @inheritdoc
     */
    public $enableCsrfValidation = false;

   public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','view','update','delete','logout','fullprofile'],
                'rules' => [
                    [
                        'actions' => ['index','fullprofile','create','view','update','delete','logout'],
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
     * Lists all Events models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new EventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Events model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $user_id=Yii::$app->user->identity->id;

        $paid=PaidForEvent::find()->where(['and', ['user_id' => $user_id], ['event_id'=>$id],['status'=>1]])->one();
        if(empty($paid)){

             $this->redirect(array('events/makepayment','pid'=>$id));
        
        }else{
        
            $pid = $id; 
            $events = Events::find()->where(['id' => $pid])->one();
            return $this->render('view', [            
                'events'=>$events,            
            ]);    
        
        }
        
        //return $this->redirect(array('site/event'));
    }

    /**
     * Creates a new Events model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Events();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }   
    }

    /**
     * Updates an existing Events model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Events model.
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
     * Finds the Events model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Events the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Events::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     public function actionMakepayment($pid)
    {
        //echo $pid;exit;
        // $searchModel = new ProfilesSearch();
        $user_id=Yii::$app->user->identity->id;
        $user=User::findOne($user_id);
        //$profile = Events::find()->where(['user_id' => $user_id])->one();
        //print_r($profile);exit;   
        //print_r($user);exit;

      return $this->render('make_payment',['user'=>$user,'pid'=>$pid]);
        

    }
     public function actionPaymentsuccess($pid)
    {
    //print_r($_REQUEST); exit;
    $model = new PaidForEvent();
    $model->user_id=Yii::$app->user->identity->id;
    $model->event_id=$pid;
    $model->status=1;
    $model->save();
    return $this->redirect(['profile/paid_for_event', 'id' => $pid]);
   // $this->redirect(array('profile/search')); 
    }

     public function actionPaymentfail($pid)
    {
        // echo $_REQUEST['status']; 
        // echo $pid;exit; 
        $model = new PaidForEvent();
        $model->user_id=Yii::$app->user->identity->id;
        $model->event_id=$pid;
        $model->status=0;
        $model->save();
        return $this->redirect(['events/view', 'id' => $pid]);
        //$this->redirect(array('profile/search'));
    }
}
