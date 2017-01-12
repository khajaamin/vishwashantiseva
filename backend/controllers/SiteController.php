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
use common\models\SmsResponse;
use common\models\SmsResponseSearch;
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
       
        $model =  new Sms();
        $smsresponse = new SmsResponse();
        if($model->load(Yii::$app->request->post())){
            
            $number = $model->msisdn;
            $msg = $model->msg;

            $response = Yii::$app->SmsResponse->getResponse($number,$msg);
            $resArr = array();
            $resArr = json_decode($response);
            for ($i=0; $i < sizeof($resArr->MessageData) ; $i++) { 
                $smsresponse->setIsNewRecord(true);
                $smsresponse->id = null;
                $smsresponse->error_code = $resArr->ErrorCode;
                $smsresponse->error_message = $resArr->ErrorMessage;
                $smsresponse->jobid = $resArr->JobId;
                $smsresponse->number=$resArr->MessageData[$i]->Number;
                $smsresponse->msg_id=$resArr->MessageData[$i]->MessageParts[0]->MsgId;
                $smsresponse->part_id=$resArr->MessageData[$i]->MessageParts[0]->PartId;
                $smsresponse->message=$resArr->MessageData[$i]->MessageParts[0]->Text;
                if($smsresponse->save()){

                    return $this->render('send_sms',['model' =>$model]);
                }      
                  
            }
            // exit;
        }  

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

    public function actionMessages($id)
    {
        $messages = \common\models\Events::find()
                ->where(['id' => $id])
                ->all();
        

        if(count($messages)>0){
            foreach($messages as $message){
                echo $message->sms;
            }
        }
        else{
            echo "Please Type something";
        }
    }
}
