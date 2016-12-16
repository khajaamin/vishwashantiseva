<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\Profiles;
use common\models\Education;
use common\models\Contact;
use common\models\User;
use common\models\ProfilesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\ForbiddenHttpException;
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


  public function actionSearch()
    {
        $searchModel = new ProfilesSearch();
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

          return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider]);
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
    // public function actionView($id)
    // {
    //     $pid = Yii::$app->user->identity->id;
    //     $checkid = Profiles::find()->where( [ 'user_id' => $pid ])->one();

    //     if($checkid['id']==$contact['user_id'] && $id==$contact['id']){

    //         return $this->render('view', [
    //             'model' => $this->findModel($id),
    //         ]);
        
    //     }
    // }
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
               // if($model->save()){
                    // $this->redirect(array('education/create')); 
               // }
               
               Yii::$app->response->redirect([
                                'profile/index',
                                'profile'=>$profile,
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

                            Yii::$app->session->setFlash('success', "Profile Updated !!!");
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
