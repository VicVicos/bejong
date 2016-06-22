<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

use app\models\LoginForm;
use app\models\Article;
use app\models\Persone;
use app\models\ContactForm;

class PageController extends Controller
{
    public $layout = 'page';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
    public function actionIndex()
    {
        return $this->render('index');
    }
    /**
     * Статьи
     * @method actionPage
     * @return [type]     [description]
     */
    public function actionPage()
    {
        $idPage = Yii::$app->request->get('id');
        $model = Article::findOne(['id' => $idPage]);
        return $this->render('page', [
            'model' => $model,
        ]);
    }
    /**
     * About
     * @method actionAbout
     * @return [type]      [description]
     */
    public function actionAbout()
    {
        $model = Article::findOne(['id' => 9]);
        return $this->render('about', [
            'model' => $model,
        ]);
    }
    /**
     * Contacts
     * @method action
     * @return [type]     [description]
     */
    public function actionContacts()
    {
        $idPage = Yii::$app->request->get('id');
        $model = Article::findOne(['id' => 10]);
        return $this->render('contacts', [
            'model' => $model,
        ]);
    }
    /**
     * Services
     * @method actionServices
     * @return [type]         [description]
     */
    public function actionServices()
    {
        $idPage = Yii::$app->request->get('id');
        $model = Article::findOne(['id' => 11]);
        return $this->render('services', [
            'model' => $model,
        ]);
    }
    public function actionTeam()
    {
        $model = Persone::find()->all();
        return $this->render('team', [
            'model' => $model,
        ]);
    }
    /**
     * Uslugi
     * @method actionUslugi
     * @return [type]       [description]
     */
    public function actionUslugi()
    {
        $idPage = Yii::$app->request->get('id');
        $model = Article::findOne(['id' => 12]);
        return $this->render('uslugi', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

}
