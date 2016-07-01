<?php
// TODO:: Страница с накладными для менеджера
namespace app\modules\lk\controllers;

use Yii;
use yii\phpoffice\phpexcel;
use yii\web\Controller;
use yii\db\Query;
use yii\helpers\Html;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

use app\components\pclzip\pclzip;

use app\models\Cargo;
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
        $cargo = new Cargo();
        if ($model->load(Yii::$app->request->post())) {
            $model->xlsxFile = UploadedFile::getInstance($model, 'xlsxFile');
            $postData = Yii::$app->request->post('File');
            if ($model->upload($postData)) {
                // File upload
                $path = Yii::$app->params['basePath'] . '/web/xlsxfile/' . $postData['userId'] . '/';
                $fileName = $model->xlsxFile->name;

                $objPHPExcel = new \PHPExcel();
                $excel = \PHPExcel_IOFactory::load($path . $fileName);
                $data = $this->parseXlsx($excel, $postData['userId']);
                $find = $cargo->findCargo($data['id_user'], $data['id_cargo']);
                if (is_null($find)) {
                    // Добавляем новые
                    $idInsertFile = $model->setFile($postData['userId'], $fileName);
                    $idInsertCargo = $cargo->setCargo($data);
                    if ($idInsertFile && $idInsertCargo) {
                        Yii::$app->session->setFlash('success', 'Накладная успешно добавлена.', false);
                        return $this->redirect('?r=lk/lk/index&user=' . $data['id_user'], 302);
                    } else {
                        Yii::$app->session->setFlash('danger', 'Ошибка добавления накладной.', false);
                    }
                } else {
                    // Обновляем
                    if ($res = $cargo->updateCargo($data, $data['id_user'], $data['id_cargo'])) {
                        Yii::$app->session->setFlash('success', 'Накладная обновлена.', false);
                        return $this->redirect('?r=lk/lk/index&user=' . $data['id_user'], 302);
                    } else {
                        Yii::$app->session->setFlash('danger', 'Ошибка обновления накладной или не чего обновлять.', false);
                    }
                }
            } else {
                Yii::$app->session->setFlash('success', 'Ошибка загрузки файла.', false);
                return $this->redirect('?r=lk/lk/index&user=' . $postData['userId'], 302);
            }

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
                    $userChild = User::findById($idUser);
                    $cargo = Cargo::findById($userChild->id);
                    return $this->render('index', [
                        'model' => $userChild,
                        'cargo' => $cargo,
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
    public static function getUserById($id)
    {
        return (new Query())
            ->select('*')
            ->from('{{%user}}')
            ->where('id=:id', [':id' => $id])->one();
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
                        $this->sendMail($user['email']);
                        // Авторизуем
                        $user = new User();
                        Yii::$app->user->login($user->findByEmail($model->email), true ? 3600*24*30 : 0);
                        // Отправить письмо при регистрации
                        return $this->redirect('?r=lk/lk/index',302);
                    } else {
                        Yii::$app->getSession()->setFlash('danger', 'Ошибка регистрации');
                    }
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
    /**
     * Отправка письма при регистрации
     * @return [type] [description]
     */
    public function sendMail ($to)
    {
        Yii::$app->mailer->compose('body')
            ->setFrom('developitb@yandex.ru')
            ->setTo($to)
            ->setSubject('Регистрация пользователя')
            ->send();
    }
    public function parseXlsx ($excel, $id)
    {
        $data = [];
        $data['id_user'] = $id;
        $cell = $excel->getActiveSheet()->getCell('H6');
        $data['id_cargo'] = $cell->getValue();
        $cell = $excel->getActiveSheet()->getCell('E12');
        $data['destination'] = $cell->getValue();
        $cell = $excel->getActiveSheet()->getCell('Q11');
        $InvDate = $cell->getValue();
        $data['date_depart'] = date('d.m.Y', \PHPExcel_Shared_Date::ExcelToPHP($InvDate));
        $cell = $excel->getActiveSheet()->getCell('Q12');
        $InvDate = $cell->getValue();
        $data['date_arrival'] = date('d.m.Y', \PHPExcel_Shared_Date::ExcelToPHP($InvDate));
        $cell = $excel->getActiveSheet()->getCell('M14');
        $data['weight'] = $cell->getValue();
        $cell = $excel->getActiveSheet()->getCell('K14');
        $data['amount'] = $cell->getValue();
        $cell = $excel->getActiveSheet()->getCell('E14');
        $data['places'] = $cell->getValue();
        $cell = $excel->getActiveSheet()->getCell('O14');
        $data['rate'] = $cell->getValue();
        $cell = $excel->getActiveSheet()->getCell('F31');
        $data['cost'] = $cell->getCalculatedValue();
        return $data;
    }
    /**
     * depricated
     * Распаковываем и читаем xlsx
     * @method extractZip
     * @param  str     $fileName  путь и имя файла
     * @return array              Данные
     */
    public static function extractZip ($dir, $fileName, $id)
	{
        $path = $dir . $fileName;

		$archive = new PclZip($path);
		if ($archive->extract(PCLZIP_OPT_PATH, 'xlsxfile/'. $id .'/extract') == 0) {
			die("Error : ".$archive->errorInfo(true));
		}
		$file = file_get_contents($dir . 'extract/xl/sharedStrings.xml');
		$xml = (array)simplexml_load_string($file);
		$sst = array();
		foreach ($xml['si'] as $item => $val) {
            $sst[] = (string)$val->t;
        }
		$file = file_get_contents($dir . 'extract/xl/worksheets/sheet1.xml');
		$xml = simplexml_load_string($file);
		$data1 = array();
		foreach ($xml->sheetData->row as $row){
			$currow = array();
			foreach ($row->c as $c){
				$value = (string)$c->v;
				$attrs = $c->attributes();
				if ($attrs['t'] == 's'){
					$currow[] = $sst[$value];
				}else{
					$currow[] = $value;
				}
			}
			$data1[] = $currow;
		}
		$line = $data1;
		return $line;
	}
}
