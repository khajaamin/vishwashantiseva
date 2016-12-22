<?php

namespace frontend\controllers;

use Yii;
use common\models\Contact;
use common\models\Profiles;
use common\models\User;
use common\models\ContactSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
/**
 * ContactController implements the CRUD actions for Contact model.
 */
class ContactController extends Controller
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
     * Lists all Contact models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContactSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $pid = Yii::$app->user->identity->id;
        $profile = Profiles::find()->where(['user_id' => $pid])->one();
        $contact = Contact::find()->where(['user_id' => $profile['id']])->asArray()->all();
        $count = Contact::find()->where(['user_id' => $profile['id']])->count();
        $user = User::find()->where(['id' => $pid])->one();    
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'user' => $user,
            'profile' => $profile,
            'contact' => $contact,
            'count' => $count,
        ]);
    }

    /**
     * Displays a single Contact model.
     * @param integer $id
     * @return mixed
     */
    // public function actionView($id)
    // {
    //     $pid = Yii::$app->user->identity->id;
    //     $checkid = Profiles::find()->where( [ 'user_id' => $pid ])->one();
    //     $contact = Contact::find()->where([
    //         'id'=>$id,
    //         'user_id' => $checkid['id']
    //     ])->one();

    //     if($checkid['id']==$contact['user_id'] && $id==$contact['id']){
            
    //         return $this->render('view', [
    //             'model' => $this->findModel($id),
    //         ]);
        
    //     }else{

    //         throw new ForbiddenHttpException("Forbidden Exception Redirecting to your account");

    //     }
    // }

    /**
     * Creates a new Contact model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Contact();
        $id = Yii::$app->user->getId();
        $checkid = Profiles::find()->where( [ 'user_id' => $id  ] )->one();
        $pid = $checkid['id'];
        $exists = Contact::find()->where( [ 'user_id' => $pid  ] )->exists();
        $count = Contact::find()->where(['user_id' => $pid])->count();
       // echo $exists.' '.$count;exit;
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
            Yii::$app->session->setFlash('error', "Contact Details Already Added!!!");
             $this->redirect(array('profile/index'));
           }            
        }else{
            if ($model->load(Yii::$app->request->post())) {
                $model->user_id=$pid;
                $model->save();
                 $this->redirect(array('profile/index'));
            } else {
                 return $this->render('create', [
                     'model' => $model,
                 ]);
            }
        }
    }

    /**
     * Updates an existing Contact model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
           $pid = Yii::$app->user->identity->id;
        $checkid = Profiles::find()->where( [ 'user_id' => $pid  ] )->one();
        $contact = Contact::find()->where(['id'=>$id,'user_id' => $checkid['id']])->one();

        if($checkid['id']==$contact['user_id'] && $id==$contact['id']){
            
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', \Yii::t('app',"Contact Details Updated Successfully !!!"));
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
     * Deletes an existing Contact model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        echo "id=".$id;exit;
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Contact model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contact the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contact::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
