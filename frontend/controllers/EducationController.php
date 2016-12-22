<?php

namespace frontend\controllers;

use Yii;
use common\models\Education;
use common\models\Profiles;
use common\models\User;
use common\models\EducationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
/**
 * EducationController implements the CRUD actions for Education model.
 */
class EducationController extends Controller
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
     * Lists all Education models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EducationSearch();
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $pid = Yii::$app->user->identity->id;

        $profile = Profiles::find()->where(['user_id' => $pid])->one();
        
        $education = Education::find()->where(['user_id' => $profile['id']])->asArray()->all();
        
        $count = Education::find()->where(['user_id' => $profile['id']])->count();
        
        $user = User::find()->where(['id' => $pid])->one();    
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'user' => $user,
            'profile' => $profile,
            'education' =>$education,
            'count' => $count,
        ]);
    }

    /**
     * Displays a single Education model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $pid = Yii::$app->user->identity->id;

        $checkid = Profiles::find()->where( [ 'user_id' => $pid  ] )->one();

        $education = Education::find()->where(['id'=>$id,'user_id' => $checkid['id']])->one();

        if($checkid['id']==$education['user_id'] && $id==$education['id']){

            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
        
            throw new ForbiddenHttpException("Forbidden Exception Redirecting to your account");
           
        }
    }

    /**
     * Creates a new Education model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Education;
        $id = Yii::$app->user->getId(); 
        $checkid = Profiles::find()->where( [ 'user_id' => $id  ] )->one();
        $pid = $checkid['id'];
        $count = Education::find()->where(['user_id' => $pid])->count();
        $exists = Education::find()->where( [ 'user_id' => $pid  ] )->exists();
        if($exists){
            if($count<4){  
                if ($model->load(Yii::$app->request->post())) {
                    $model->user_id=$pid;
                    $model->save();
                    $this->redirect(array('profile/index'));                
                }else{
                    return $this->render('create', [
                     'model' => $model,
                     ]);
                }
           }else{
            Yii::$app->session->setFlash('error', "Education Details Already Added!!!");
             $this->redirect(array('profile/index'));
           }            
        }else{
            if ($model->load(Yii::$app->request->post())) {
                $model->user_id=$pid;
                $model->save();
                 $this->redirect(array('contact/create'));
            } else {
                 return $this->render('create', [
                     'model' => $model,
                 ]);
            }
        }
    }

    /**
     * Updates an existing Education model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $pid = Yii::$app->user->identity->id;

        $checkid = Profiles::find()->where( [ 'user_id' => $pid  ] )->one();

        $education = Education::find()->where(['id'=>$id,'user_id' => $checkid['id']])->one();

        if($checkid['id']==$education['user_id'] && $id==$education['id']){
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success',\Yii::t('app',"Education Details Updated Successfully !!!") );
                return $this->redirect(array('profile/index'));
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }else{

            throw new ForbiddenHttpException("Forbidden Exception Redirecting to your account");
        }

    }

    /**
     * Deletes an existing Education model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect('index');
    }

    /**
     * Finds the Education model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Education the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Education::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
