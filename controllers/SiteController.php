<?php
// FIXME: Задания в кесе.
// FIXME: Вывод менюшек в массиве и цикле. Меню из базы.
// FIXME: Вывод форм после отправки. Конфликт.
// FIXME: Удаление накладных.
// FIXME: Запрет на накладные не по шаблону.
// TODO: Тестирование и отладка.
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\CargoForm;
use app\models\ReviewForm;
use app\models\Article;
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
        $model = Article::getType('tabs');
        return $this->render('index', [
            'model' => $model
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
        return $this->redirect(['lk/lk/index'],302);
    }

    public function actionContact()
    {
        $mode = Yii::$app->request->get('mode');
        if ($mode === 'application') {
            $model = new ContactForm();
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                Yii::$app->session->setFlash('contactFormApplication', 'Письмо отправлено.', false);
                $result = $model->contact();
            }
            $status = '';
        } elseif ($mode === 'cargo') {
            $model = new CargoForm();
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                Yii::$app->session->setFlash('contactFormCargo', 'Письмо отправлено.', false);
                // $result = $model->contact();
                $result = true;
                $status = $model->getStatus($model->idCargo);
            }
        } elseif ($mode === 'review') {
            $model = new ReviewForm();
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                Yii::$app->session->setFlash('contactFormReview', 'Письмо отправлено.', false);
                $result = $model->contact();
                $model->img = UploadedFile::getInstanceByName('ReviewForm[img]');
                if ($model->img) {
                    $model->img = 'review/' . $model->uploadImg($model);
                }
                $model->setReview();
            }
            $status = '';
        }
        return $this->renderAjax('contact', [
            'model' => $model,
            'mode' => $mode,
            'status' => $status,
            'result' => $result
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
