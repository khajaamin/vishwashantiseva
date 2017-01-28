<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Sliders;
use common\models\Profiles;
use common\models\ProfilesSearch;
use common\models\Education;
use common\models\Contact;
use common\models\Gallery;
use common\models\GallerySearch;
use common\models\Events;
use common\models\EventsSearch;
use common\models\Contacts;

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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup','gallery'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        
        $slider = new Sliders;
        $searchModel = new ProfilesSearch();

        $sliders = $slider->find()->all(); 
        return $this->render('index',['sliders'=>$sliders,'searchModel'=>$searchModel]);
    }

    public function actionGallery()
    {

        $searchModel = new GallerySearch();
        $searchModel->is_active = 1;    
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('gallery', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }



    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
           //$this->redirect(array('profile/create'));
             return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
           if ($model->sendEmail(Yii::$app->params['adminEmail'])) {

                $contact = new  Contacts(); 
                $contact->name = $model->name ;
                $contact->email = $model->email ;
                $contact->subject = $model->subject ;
                $contact->body = $model->body ;
                //print_r($contact);exit;

                $contact->save(false);
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
             } else {
                 Yii::$app->session->setFlash('error', 'There was an error sending email.');
             }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionFaqs()
    {
        return $this->render('faqs');
    }
    public function actionPrivacy()
    {
        return $this->render('privacy');
    }
    public function actionService()
    {
        return $this->render('service');
    }
    public function actionTerms()
    {
        return $this->render('terms');
    }
    public function actionEvent(){
        
        $time = new \DateTime('now');
        $today = $time->format('Y-m-d');
        //$currtime= $time->format('h:i:s');
        //echo $currtime ;exit;
        $searchModel = new EventsSearch();
        $searchModel->status = 1;    
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['>=','date',$today])->all();
        //echo "<pre>";print_r($s);exit;
        return $this->render('event', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);   
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
   
     if (!Yii::$app->user->isGuest) {
        $this->redirect(array('profile/update'));
    }

        $model = new SignupForm();
   
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {

                if (Yii::$app->getUser()->login($user)) {
                   $profile = new Profiles();
                   $profile->user_id = Yii::$app->user->identity->id;

                   $profile->save(false);
                    
                   $profile = new Education();
                   $profile->user_id =Yii::$app->user->identity->id;
                   $profile->save(false);
                    
                   $profile = new Contact();
                   $profile->user_id = Yii::$app->user->identity->id;
                   $profile->save(false);
             
                     $this->redirect(array('profile/update'));
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
