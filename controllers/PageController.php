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
use app\models\QuestionForm;

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
    public function actionPage()
    {
        $idPage = Yii::$app->request->get('id');
        $model = Article::findOne(['id' => $idPage]);
        return $this->render('page', [
            'model' => $model
        ]);
    }
    public function actionAbout()
    {
        $model = Article::findOne(['id' => 9]);
        return $this->render('about', [
            'model' => $model,
        ]);
    }
    public function actionJobs()
    {
        $model = Article::findOne(['id' => 40]);
        return $this->render('jobs', [
            'model' => $model,
        ]);
    }
    public function actionContacts()
    {
        $idPage = Yii::$app->request->get('id');
        $model = Article::findOne(['id' => 10]);
        return $this->render('contacts', [
            'model' => $model,
        ]);
    }
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
    /**
     * Страница с вопрос-ответ
     * @method actionQuestion
     * @return raw
     */
    public function actionQuestion()
    {
        $model = Article::findOne(['id' => 45]);
        if (Yii::$app->request->get('id') === '45' && is_object($model)) {
            $elem = new QuestionForm();
            $idPage = Yii::$app->request->get('id');

            $form = true;
            if ($elem->load(Yii::$app->request->post())) {
                if ($elem->contact()) {
                    $form = false;
                    Yii::$app->session->setFlash('success', 'Ваш вопрос был отправлен. Скоро наши специалисты ответят Вам.', false);
                } else {
                    Yii::$app->session->setFlash('danger', 'Ошибка отправления сообщения.', false);
                }
            }
            return $this->render('page', [
                'model' => $model,
                'form' => $form,
                'elem' => $elem
            ]);
        } else {
            return $this->redirect(['lk/lk/error'],302);
        }
    }
}
