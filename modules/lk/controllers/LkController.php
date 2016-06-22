<?php

namespace app\modules\lk\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\RegisterUser;
/**
 * Default controller for the `lk` module
 */
class LkController extends Controller
{
    public $layout = 'lk';
    public $vpass2 = '';
    /**
     * Главная страница личного кабинета
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    //
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
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->password === $model->vpass) {
                    # code...
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
}
