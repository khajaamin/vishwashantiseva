<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\Profiles;
use common\models\Plans;
use common\models\Masters;
use common\models\Events;
use common\models\PaidProfiles;
use common\models\Education;
use common\models\Contact;
use common\models\User;
use common\models\ProfilesSearch;
use common\models\SmsResponse;
use common\models\SmsResponseSearch;
use frontend\models\Curl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\ForbiddenHttpException;
use common\models\SiteSetting;
use kartik\mpdf\Pdf;

/**
 * ProfileController implements the CRUD actions for Profiles model.
 */
class ProfileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','view','Createpdf','update','delete','logout','fullprofile'],
                'rules' => [
                    [
                        'actions' => ['index','fullprofile','create','view','Createpdf','update','delete','logout'],
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
    if ($action->id == 'search' || $action->id == 'makepayment' ||  $action->id == "paymentfail" ||  $action->id == "paymentsuccess") {
        $this->enableCsrfValidation = false;
    }
    return parent::beforeAction($action);
}

  public function actionPaymentsuccess($pid)
{
    $model = new PaidProfiles();
    $dump = serialize($_REQUEST);
    $model->user_id=Yii::$app->user->identity->id;
    $model->paid_for_profile_id=$_REQUEST['pid'];
    $model->date = $_REQUEST['addedon'];
    $model->status=1;
    $model->bank_ref_num=$_REQUEST['bank_ref_num'];
    $model->bankcode=$_REQUEST['bankcode'];
    $model->unmappedstatus=$_REQUEST['unmappedstatus'];
    $model->addedon = $_REQUEST['addedon'];
    $model->mihpayid = $_REQUEST['mihpayid'];
    $model->dump_response = $dump;
    $phone = $_REQUEST['phone'];        
    $msg = "Successfully register for vishwashanti"; 
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
    return $this->redirect(['profile/view', 'id' => $pid]);

}

 public function actionPaymentfail($pid)
{

    $model = new PaidProfiles();
    $smsresponse = new SmsResponse();
    $dump = serialize($_REQUEST);
    $model->user_id=Yii::$app->user->identity->id;
    $model->paid_for_profile_id=$_REQUEST['pid'];;
    $model->date = $_REQUEST['addedon'];
    $model->status=0;
    $model->bank_ref_num=$_REQUEST['bank_ref_num'];
    $model->bankcode=$_REQUEST['bankcode'];
    $model->unmappedstatus=$_REQUEST['unmappedstatus'];
    $model->addedon = $_REQUEST['addedon'];
    $model->mihpayid = $_REQUEST['mihpayid'];
    $model->dump_response = $dump;        
      
    $model->save();    
    return $this->redirect(['profile/view', 'id' => $pid]);
}

  public function actionFullprofile()
  {
        $id =  Yii::$app->request->queryParams('id');
        $profile = Profiles::find()->where(['id' => $id])->one();
        return $this->render('full_profile', [
            'model' => $profile]);
  }



  public function actionSearch()
    {

        $searchModel = new ProfilesSearch();
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $profiles = $dataProvider->getModels();
        $similars =Events::find()->where(['status'=>1])->orderBy('date')->limit(4)->all();

          return $this->render('search', [
            'similars'=>$similars,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider]);
    }

    //   public function actionSubcategory()
    // {
    //         $ids =Yii::$app->request->get('id'); 
    //         $model = new Categories();
    //         $categories = \common\models\Categories::find()
    //                 ->where(['in','parent_id', $ids])
    //                 ->all(); 
    //         if(count($categories) > 0){
    //             foreach($categories as $post){
    //                 echo "<option value='".$post->id."'>".$post->category_name."</option>";
    //             }
    //         }
    //         else{
    //             echo "<option>-</option>";
    //         }
    // }

    public function actionSubcaste()
    {
            $ids =Yii::$app->request->get('id'); 
            $model = new Masters();
            if($ids!=0)
            {
                $castes = \common\models\Masters::find()
                        ->where(['in','parent_id', $ids])
                        ->all(); 
                if(count($castes) > 0){
                    foreach($castes as $caste){

                        echo "<option value='".$caste->id."'>$caste->name</option>";
                    }
                }else
                {
                   echo "<option>-</option>";   
                }
            }
            else{
                echo "<option>-</option>";
            }
    }

    public function actionAdvancedsearch()
    {
        $gender = "M";
        $searchModel = new ProfilesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $profiles = $dataProvider->getModels();

        if(!empty($profiles[0]))
        {
          $gender= $profiles[0]['gender'];
        }        
        if(isset(Yii::$app->user->identity->id)){

                $similars =Profiles::find()->where(['gender'=>$gender])->andWhere(['!=','user_id',Yii::$app->user->identity->id])->indexBy('id')->limit(8)->all();
        }else{

                $similars =Profiles::find()->where(['gender'=>$gender])->indexBy('id')->limit(8)->all();

        }

        return $this->render('advanced_search', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'profiles'=>$profiles,
        'similars'=>$similars,]);
    }

    // public function actionPaidforprofile()
    // {
      
    //   $user_id=Yii::$app->user->identity->id;
     
    //   $user=User::findOne($user_id);
    //   $records=$user->getPaidprofiles()->andWhere(['status'=>1])->all();
    //   //print_r($records);
    //   return $this->render('paid_for_profile',['records'=>$records]);
      
    // }
    public function actionPaidforevent()
    {
      
      $user_id=Yii::$app->user->identity->id;
     
      $user=User::findOne($user_id);
      $records=$user->getPaidForEvents()->andWhere(['status'=>1])->all();
      //print_r($records);
      return $this->render('paid_for_event',['records'=>$records]);
      
    }

    public function actionMakepayment($pid)
    {
        //echo $pid;exit;
        $plan = Plans::findOne(1);
        $searchModel = new ProfilesSearch();
        $user_id=Yii::$app->user->identity->id;
        $user=User::findOne($user_id);
        $profile = Profiles::find()->where(['user_id' => $user_id])->one();
       
        //print_r($profile);exit;   
        //print_r($user);exit;

      return $this->render('make_payment',['user'=>$user,'profile'=>$profile,'pid'=>$pid,'plan'=>$plan]);
        

    }
     public function actionMakepaymentForEvent($pid)
    {
      return $this->render('make_payment_for_event');
    }

    /**
     * Lists all Profiles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfilesSearch();
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $pid = Yii::$app->user->identity->id;
        
        $profile = Profiles::find()->where(['user_id' => $pid])->one();
        
        $education = Education::find()->where(['user_id' => $profile->id])
        ->asArray()
        ->all();

        $contact = Contact::find()->where(['user_id' => $profile->id])
        ->asArray()
        ->all();
        
        $user = User::find()->where(['id' => $pid])->one();

        $count = Education::find()->where(['user_id' => $profile['id']])->count();

        $count1 = Contact::find()->where(['user_id' => $profile['id']])->count();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'profile'=>$profile,
            'user'=>$user,
            'education'=>$education,
            'contact'=>$contact,
            'count'=>$count,
            'count1'=>$count1,
        ]);
    }

    /**
     * Displays a single Profiles model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $user_id=Yii::$app->user->identity->id;
               
          $paid=PaidProfiles::find()->where(['and', ['user_id' => $user_id],['status'=>1]])->one();                
          
          if(!empty($paid))
          {
              $now = time(); 
              
              $paid_date = strtotime($paid->addedon);          
          
              $datediff = $now - $paid_date;
        
              $days=floor($datediff / (60 * 60 * 24));
              //if(!empty($paid->plan_id))      
              // {
                $plan_id = $paid->plan_id;

              // }
              $plans = Plans::find()->where(['id'=>$plan_id])->one();
              //print_r($plans);exit;
                  if(!empty($plans))
                  {


                      if($days <= $plans->days)
                      {
                        
                        $searchModel = new ProfilesSearch();
                    
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                        $pid = $id;
                    

                        $profile = Profiles::find()->where(['id' => $pid])->one();


                        $similars =Profiles::find()->where(['gender' => $profile->gender])->andWhere(['!=','user_id', Yii::$app->user->identity->id])->andWhere(['!=','user_id', $id])->limit(4)->all();
              
                        return $this->render('view', [
                          'searchModel' => $searchModel,
                          'dataProvider' => $dataProvider,
                          'profile'=>$profile,           
                          'similars'=>$similars,
                        ]);
                      }else{

                        $this->redirect(array('profile/makepayment','pid'=>$id));
                      } 
               }//if plan is empty
               else
               {
                  throw new NotFoundHttpException("Please try again later...!!!");  
               }
          }else{
                
                $this->redirect(array('profile/makepayment','pid'=>$id));
          
          }           
    }
    public function actionCreatepdf($id)
    {

        $user_id=Yii::$app->user->identity->id;
               
          $paid=PaidProfiles::find()->where(['and', ['user_id' => $user_id],['status'=>1]])->one();                
          
          if(!empty($paid))
          {
              $now = time(); 
              
              $paid_date = strtotime($paid->addedon);          
          
              $datediff = $now - $paid_date;
        
              $days=floor($datediff / (60 * 60 * 24));
              //if(!empty($paid->plan_id))      
              // {
                $plan_id = $paid->plan_id;

              // }
              $plans = Plans::find()->where(['id'=>$plan_id])->one();
              //print_r($plans);exit;
                  if(!empty($plans))
                  {


                      if($days <= $plans->days)
                      {
                        
                        $searchModel = new ProfilesSearch();
                    
                        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                        $pid = $id;
                    

                        $profile = Profiles::find()->where(['id' => $pid])->one();


                        $similars =Profiles::find()->where(['gender' => $profile->gender])->andWhere(['!=','user_id', Yii::$app->user->identity->id])->andWhere(['!=','user_id', $id])->limit(4)->all();
              
                         $content= $this->renderPartial('pdf', [
                          'searchModel' => $searchModel,
                          'dataProvider' => $dataProvider,
                          'profile'=>$profile,           
                          'similars'=>$similars,
                        ]);

                        $pdf = new Pdf([
                                          // set to use core fonts only
                                          'mode' => Pdf::MODE_UTF8, 
                                          // A4 paper format
                                          'format' => Pdf::FORMAT_A4, 
                                          // portrait orientation
                                          'orientation' => Pdf::ORIENT_PORTRAIT, 
                                          // stream to browser inline
                                          'destination' => Pdf::DEST_BROWSER, 
                                          // your html content input
                                          'content' => $content,  
                                          // format content from your own css file if needed or use the
                                          // enhanced bootstrap css built by Krajee for mPDF formatting 
                                          'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                                          // any css to be embedded if required
                                          'cssInline' => '.kv-heading-1{font-size:18px;}', 
                                           // set mPDF properties on the fly
                                          'options' => ['title' => 'Vishwashantiseva'],
                                           // call mPDF methods on the fly
                                          'methods' => [ 
                                              'SetHeader'=>['Vishwashantiseva'], 
                                              'SetFooter'=>['{PAGENO}'],
                                          ]
                                      ]);
                                   // print_r($content);exit;

                                  // return the pdf output as per the destination setting
                                  return $pdf->render(); 
                      }else{

                        $this->redirect(array('profile/makepayment','pid'=>$id));
                      } 
               }//if plan is empty
               else
               {
                  throw new NotFoundHttpException("Please try again later...!!!");  
               }
          }else{
                
                $this->redirect(array('profile/makepayment','pid'=>$id));
          
          }           
    }
    /**
     * Creates a new Profiles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $id = Yii::$app->user->getId();
 
        $exists = Profiles::find()->where( [ 'user_id' => $id  ] )->exists();
  


        if($exists){
        
            $this->redirect(array('profile/index'));
        
        }else{
        
                $model = new Profiles();
            
            if ($model->load(Yii::$app->request->post())) {
                
               $imageName = "profile_image_".rand();
           
               $model->profile_image = UploadedFile::getInstance($model,'profile_image');
           
               $model->profile_image->saveAs('images/profile/'.$imageName.'.'.$model->profile_image->extension);
           
               $model->profile_image = $imageName.'.'.$model->profile_image->extension;
               $model->user_id = Yii::$app->user->getId();
           
               $model->save();
              
               Yii::$app->response->redirect([
                                'profile/index',
                                'user'=>$user,
                                'education'=>$education,
                                'contact'=>$contact,
                                'count'=>$count,
                                'count1'=>$count1,
                            ]);
            } else {
            
                return $this->render('create', [
                    'model' => $model,
                ]);
            
            }
        }
    }

    /**
     * Updates an existing Profiles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        $pid = Yii::$app->user->identity->id;
        // echo $pid;exit;        
        $profile = Profiles::find()->where(['user_id' => $pid])->one();
        
        $user = User::find()->where(['id' => $pid])->one();

        $education = Education::find()->where(['user_id' => $profile->id])
        ->asArray()
        ->all();

        $contact = Contact::find()->where(['user_id' => $profile->id])
        ->asArray()
        ->all();
        
        $user = User::find()->where(['id' => $pid])->one();

        $count = Education::find()->where(['user_id' => $profile['id']])->count();

        $count1 = Contact::find()->where(['user_id' => $profile['id']])->count();
        

        if($pid==$profile['user_id']){
        
             $model = $this->findModel($profile->id);

            if ($model->load(Yii::$app->request->post())) {
 
                    $model->profile_image;
                    $imageName = "profile_image_".rand();
                    $model->profile_image = UploadedFile::getInstance($model,'profile_image');

                    //calculating age
                    if(!empty($model->date_of_birth))
                    {
                      $orderdate = explode('-', $model->date_of_birth);    
                      $year=$orderdate[2];
                      $currentyr=date("Y");
                      $age=($currentyr-$year)+1; 
                      $model->age=$age;
                    } 
                   if(!empty($model->profile_image)){
                   
                       $model->profile_image->saveAs('images/profile/'.$imageName.'.'.$model->profile_image->extension);
                    
                       $model->profile_image = $imageName.'.'.$model->profile_image->extension;
                    
                       $model->save(false);

                        return $this->redirect(['view', 'id' => $model->id]);
                    
                    }else{  

                        $pid = Yii::$app->user->identity->id;
                    
                        $user_image = Profiles::find()->where(['user_id' => $pid])->one();

                        $model->profile_image = $user_image->profile_image;
                        
                        $model->save(false);
                        
                        if($model->save(false)){

                            Yii::$app->session->setFlash('success', \Yii::t('app', "Profile Updated !!!"));
                            Yii::$app->response->redirect([
                                'profile/index',
                                'profile'=>$profile,
                                'user'=>$user,
                                'education'=>$education,
                                'contact'=>$contact,
                                'count'=>$count,
                                'count1'=>$count1,
                            ]);
                        }    
                        
                    }
            }else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }


        }else{
            throw new ForbiddenHttpException("Forbidden Exception Redirecting to your account");
        }

    }

    /**
     * Deletes an existing Profiles model.
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
     * Finds the Profiles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profiles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profiles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
