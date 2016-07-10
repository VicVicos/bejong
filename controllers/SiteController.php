<?php
// TODO: Пункт меню Услуги - выпадашка
// TODO: Удалять записи об отправке
// TODO: Вопрос-ответ
// TODO: Асинхронная загрузка файлов
// TODO: Адаптив
// TODO: Анимация.
// FIXME: Задания в кесе.
// FIXME: Порядок в текстах письма
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\CargoForm;
use app\models\ReviewForm;
use app\models\Cargo;

use yii\web\UploadedFile;

class SiteController extends Controller
{
    public $layout = 'single';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?'],
                        'matchCallback' => function () {
                            return true;
                        }
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return true;
                        }
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

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->redirect(['lk/lk/index'],302);
    }
    public function actionContact()
    {
        $mode = Yii::$app->request->get('mode');
        if ($mode === 'application') {
            $model = new ContactForm();
        } elseif ($mode === 'cargo') {
            $model = new CargoForm();
        } elseif ($mode === 'review') {
            $model = new ReviewForm();
            if ($model->load(Yii::$app->request->post())) {
                $model->img = UploadedFile::getInstance($model, 'img');
                if ($model->img) {
                    $model->img = 'review/' . $model->uploadImg();
                }
                $model->setReview();
            }
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            Yii::$app->session->setFlash('contactFormSubmitted', 'Письмо отправлено.', false);
            $result = $model->contact();
        }
        return $this->renderAjax('contact', [
            'model' => $model,
            'mode' => $mode,
            'result' => $result
        ]);
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
