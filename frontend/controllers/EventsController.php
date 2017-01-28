<?php

namespace frontend\controllers;

use Yii;
use common\models\Events;
use common\models\SiteSetting;
use common\models\User;
use common\models\EventsSearch;
use common\models\PaidForEvent;
use common\models\SmsResponse;
use common\models\SmsResponseSearch;
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
    // public $enableCsrfValidation = false;

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


    public function beforeAction($action)
    {            
        if ($action->id == 'makepayment' ||  $action->id == "paymentfail" ||  $action->id == "paymentsuccess") {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
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

        // print_r($paid);exit;    
        //->andWhere(['!=', 'cancel_date', $date])->all();

        $similars =Events::find()->where(['status'=>1])->andWhere(['!=', 'id', $id])->orderBy('date')->limit(4)->all();
        if(empty($paid)){

             $this->redirect(array('events/makepayment','pid'=>$id));
        
        }else{
        
            $pid = $id; 
            $events = Events::find()->where(['id' => $pid])->one();
            return $this->render('view', [            
                'events'=>$events,
                'paid'=>$paid,
                'similars'=>$similars,            
            ]);    
        
        }
        
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
        $event = Events::findOne($pid);

        $user_id=Yii::$app->user->identity->id;
        
        $site = SiteSetting::findOne(1);

        //print_r($site);
        //exit;

        $user=User::findOne($user_id);

        return $this->render('make_payment',['user'=>$user,'pid'=>$pid,'event'=>$event,'site'=>$site]);
    }
     public function actionPaymentsuccess($pid)
    {

        $model = new PaidForEvent();        
        $smsresponse = new SmsResponse();
        $dump = serialize($_REQUEST);
        $model->user_id=Yii::$app->user->identity->id;
        $model->event_id=$_REQUEST['pid'];;
        $model->status=1;
        $model->bank_ref_num=$_REQUEST['bank_ref_num'];
        $model->bankcode=$_REQUEST['bankcode'];
        $model->unmappedstatus=$_REQUEST['unmappedstatus'];
        $model->addedon = $_REQUEST['addedon'];
        $model->mihpayid = $_REQUEST['mihpayid'];
        $model->dump_response = $dump;
        $phone = $_REQUEST['phone'];        
        $msg = "Successfully register for vishwashanti melava";  
        $resArr = array();
        $response = Yii::$app->SmsResponse->getResponse($phone,$msg);         
         $resArr = json_decode($response);
        if($model->save()){
        
             if(isset($resArr)){              
                    $smsresponse->error_code = $resArr->ErrorCode;
                    $smsresponse->error_message = $resArr->ErrorMessage;
                    $smsresponse->jobid = $resArr->JobId;
                    $smsresponse->number = $resArr->MessageData[0]->Number;
                    $smsresponse->msg_id = $resArr->MessageData[0]->MessageParts[0]->MsgId;
                    $smsresponse->part_id = $resArr->MessageData[0]->MessageParts[0]->PartId;
                    $smsresponse->message = $resArr->MessageData[0]->MessageParts[0]->Text;
                    $smsresponse->save();
             }
        
        }
        //$model->save();
        
        return $this->redirect(['events/paid_for_event', 'id' => $pid]); 
    }

     public function actionPaymentfail($pid)
    {
        $model = new PaidForEvent();
        $dump = serialize($_REQUEST);
        $model->user_id=Yii::$app->user->identity->id;
        $model->event_id=$_REQUEST['pid'];;
        $model->status=0;
        $model->bank_ref_num=$_REQUEST['bank_ref_num'];
        $model->bankcode=$_REQUEST['bankcode'];
        $model->unmappedstatus=$_REQUEST['unmappedstatus'];
        $model->addedon = $_REQUEST['addedon'];
        $model->mihpayid = $_REQUEST['mihpayid'];
        $model->dump_response = $dump;
        $model->save();
       return $this->redirect(['events/view', 'id' => $pid]);
    }

}
