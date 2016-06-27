<?php
// TODO:: Страница с накладными для менеджера
namespace app\modules\lk\controllers;

use Yii;
use yii\web\Controller;
use yii\db\Query;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\components\excel\Excel;

use app\models\File;
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
                'only' => ['index', 'manager', 'ddoc', 'updoc', 'register', 'login', 'logout'],
                'rules' => [
                    [
                        'actions' => ['manager', 'ddoc', 'updoc', 'register', 'login', 'logout'],
                        'allow' => true,
                        'roles' => ['?'],
                        'matchCallback' => function () {
                            return false;
                        }
                    ],
                    [
                        'actions' => ['index', 'register', 'login'],
                        'allow' => true,
                        'roles' => ['?'],
                        'matchCallback' => function () {
                            return true;
                        }
                    ],
                    [
                        'actions' => ['index', 'manager', 'ddoc', 'updoc', 'logout', 'login'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return $this->isManager();
                        }
                    ],
                    [
                        'actions' => ['index', 'ddoc', 'logout'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return $this->isMember();
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
    public function actionUpload ()
    {
        $model = new File();
        if ($model->load(Yii::$app->request->post())) {
            $model->xlsxFile = UploadedFile::getInstance($model, 'xlsxFile');
            if ($resUpFile = $model->upload(Yii::$app->request->post('File'))) {
                // File upload
                var_dump($resUpFile);
                $path = Yii::$app->params['basePath'];
                $data = Excel::import($path, $config); // $config is an optional
            }
            // if ($model->validate()) {
            //     // form inputs are valid, do something here
            //     return;
            // }
        }

        return $this->render('upload', [
            'model' => $model,
        ]);
    }
    /**
     * Главная страница личного кабинета
     * @return string
     */
    public function actionIndex()
    {
        $role = $this->getRole();
        $model = $this->getUser();
        $member = $this->getMember($model->id);
        if ($role == 'member') {
            $route = 'member';
        } elseif ($role == 'manager' || $role == 'admin') {
            $route = 'manager';
        } else {
            $route = 'other';
        }
        switch ($route) {
            case 'manager':
                if ($idUser = Yii::$app->request->get('user')) {
                    $userChild = $this->getUserById($idUser);
                    return $this->render('index', [
                        'model' => $userChild[0],
                        'manager' => true
                    ]);
                } else {
                    return $this->render('manager', [
                        'model' => $model,
                        'member' => $member
                    ]);
                }
                break;
            case 'member':
                return $this->render('index', ['model' => $model]);
                break;
            default:
                return $this->redirect('?r=lk/lk/login',302);
                break;
        }
    }
    //
    public function getUser()
    {
        return Yii::$app->user->identity;
    }
    public function getUserById($id)
    {
        return (new Query())
            ->select('*')
            ->from('{{%user}}')
            ->where('id=:id', [':id' => $id])
            ->all();
    }
    public function getRole()
    {
        return Yii::$app->user->identity->role;
    }

    public function getMember ($id)
    {
        $user = new User();
        return (new Query())
            ->select('id')
            ->from('{{%user}}')
            ->where('id_manager=:id', [':id' => $id])
            ->all();
    }
    /**
     * Если пользователь управленец
     * @return boolean [description]
     */
    public function isManager ()
    {
        $role = $this->getRole();
        switch ($role) {
            case 'admin':
                return true;
                break;
            case 'manager':
                return true;
                break;
            default:
                return false;
                break;
        }
    }
    /**
     * Если пользователь просто пользователь
     * @return boolean [description]
     */
    public function isMember ()
    {
        $role = $this->getRole();
        switch ($role) {
            case 'member':
                return true;
                break;
            default:
                return false;
                break;
        }
    }
    /**
     * Страница менеджера
     * @method actionManager
     * @return [type]        [description]
     */
    public function actionManager()
    {
        $model = $this->getUser();
        $member = $this->getMember($model->id);
        return $this->render('manager', [
            'model' => $model,
            'member' => $member
        ]);
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
}
