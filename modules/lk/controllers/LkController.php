<?php

namespace app\modules\lk\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Html;
use yii\filters\AccessControl;

use app\models\User;
use app\models\LoginForm;
use app\models\RegisterUser;
/**
 * Default controller for the `lk` module
 */
class LkController extends Controller
{
    public $layout = 'lk';
    public $vpass = '';
    public $user = '';
    /**
     * ? - гость @ - Авторизованный
     * @method behaviors
     * @return [type]    [description]
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['manager', 'index'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }
    /**
     * Главная страница личного кабинета
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->identity) {
            return $this->render('index');
        } else {
            return $this->redirect('?r=lk/lk/login',302);
        }
    }
    //
    public function getRole ()
    {
        return $this->user->role;
    }
    /**
     * Страница менеджера
     * @method actionManager
     * @return [type]        [description]
     */
    public function actionManager()
    {
        return $this->render('manager');
    }
    /**
     * Страница загрузки накладных - для менеджера?
     * @method actionDdoc
     * @return [type]     [description]
     */
    public function actionDdoc()
    {
        return $this->render('ddoc');
    }
    /**
     * Страница скачивания накладных - для клиента?
     * @method actionUpdoc
     * @return [type]      [description]
     */
    public function actionUpdoc()
    {
        return $this->render('Updoc');
    }
    /**
     * Авторизация
     * @method actionLogin
     * @return [type]      [description]
     */
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
    /**
     * RegisterUser
     * @method actionRegister
     * @return [type]         [description]
     */
    public function actionRegister()
    {
        $model = new RegisterUser();
        $user = [];
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->password === $model->vpass) {
                    $user['email'] = Html::encode($model->email);
                    $user['pass'] = Html::encode($model->password);
                    $user['name'] = Html::encode($model->name);
                    $user['contact'] = Html::encode($model->contact);
                    $user['address'] = Html::encode($model->address);
                    $res = RegisterUser::registerUser($user);
                    // Отправить письмо при регистрации
                    if (is_int($res)) {
                        Yii::$app->session->setFlash('success', 'Регистрация прошла успешно.', false);
                        // Авторизуем
                        $user = new User();
                        Yii::$app->user->login($user->findByEmail($model->email), true ? 3600*24*30 : 0);
                        return $this->redirect('?r=lk/lk/index',302);
                    } else {
                        Yii::$app->getSession()->setFlash('error', 'Ошибка регистрации');
                    }
                    // var_dump($res);
                    //
                } else {
                    $model->addError('vpass', 'Пароли должны совпадать');
                }
                return $this->render('register', [
                    'model' => $model
                ]);
            } else {
                $model->addError('password', 'Данные не прошли валидацию.');
            }
        }
        return $this->render('register', [
            'model' => $model,
        ]);
    }
    /**
     * Выход из сервиса
     * @method actionLogout
     * @return [type]       [description]
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    public function beforeAction()
    {
        $this->user = Yii::$app->user->identity;
        return true;
    }

}
