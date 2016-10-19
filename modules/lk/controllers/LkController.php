<?php
// TODO: Сброс пароля, тестирование - проблема с релиректом после сброса.
// TODO: Раз в сутки очищать значения полей hash в таблице user
// FIXME: Проверка на дату полей даты отправки и приёма
// FIXME: Удаление пробелов при добавлении данных в базу, актуально для накладной
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
use app\models\Mailer;
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
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
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
                'only' => ['index', 'manager', 'ddoc', 'updoc', 'register', 'login', 'logout', 'restore'],
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
                        'actions' => ['index', 'register', 'login', 'restore'],
                        'allow' => true,
                        'roles' => ['?'],
                        'matchCallback' => function () {
                            return true;
                        }
                    ],
                    [
                        'actions' => ['register'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            return $this->isNewUser();
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
                    $idInsertCargo = $cargo->setCargo($data);
                    $insertId = Yii::$app->db->getLastInsertID();
                    $idInsertFile = $model->setFile($postData['userId'], $insertId, $fileName);

                    if ($idInsertFile && $idInsertCargo) {
                        Yii::$app->session->setFlash('success', 'Накладная успешно добавлена.', false);
                        return $this->redirect(['index', 'user' => $data['id_user']], 302);
                    } else {
                        Yii::$app->session->setFlash('danger', 'Ошибка добавления накладной.', false);
                    }
                } else {
                    // Обновляем
                    if ($res = $cargo->updateCargo($data, $data['id_user'], $data['id_cargo'])) {
                        Yii::$app->session->setFlash('success', 'Накладная обновлена.', false);
                        return $this->redirect(['index', 'user' => $data['id_user']], 302);
                    } else {
                        Yii::$app->session->setFlash('danger', 'Ошибка обновления накладной или не чего обновлять.', false);
                    }
                }
            } else {
                Yii::$app->session->setFlash('success', 'Ошибка загрузки файла.', false);
                return $this->redirect(['index', 'user' => $postData['userId']], 302);
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
        switch ($role) {
            case 'admin':
                if ($idUser = Yii::$app->request->get('user')) {
                    $userChild = User::findById($idUser);
                    $cargo = Cargo::findById($userChild->id);
                    return $this->render('index', [
                        'model' => $userChild,
                        'cargo' => $cargo,
                        'file' => $file,
                        'manager' => true
                    ]);
                } else {
                    if (Yii::$app->request->get('all-user')) {
                        $member = $this->getAllMember();
                    }
                    return $this->render('manager', [
                        'model' => $model,
                        'member' => $member
                    ]);
                }
                break;
            case 'manager':
                if ($idUser = Yii::$app->request->get('user')) {
                    $userChild = User::findById($idUser);
                    $cargo = Cargo::findById($userChild->id);
                    return $this->render('index', [
                        'model' => $userChild,
                        'cargo' => $cargo,
                        'file' => $file,
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
                $cargo = Cargo::findById(Yii::$app->user->identity->id);
                return $this->render('index', [
                    'model' => $model,
                    'cargo' => $cargo
                ]);
                break;
            default:
                return $this->redirect('login',302);
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
        if (Yii::$app->user->identity->role === 'admin') {
            $member = $this->getAllMember();
        } else {
            $member = $this->getMember($model->id);
        }
        return $this->render('manager', [
            'model' => $model,
            'member' => $member
        ]);
    }
    /**
     * Страница загрузки накладных - для менеджера?
     * @method actionDdoc
     * @return [type]    html
     */
    public function actionCargo()
    {
        if (null !== Yii::$app->request->get('cargo') && null !== Yii::$app->request->get('user')) {
            $idUser = (int)Yii::$app->request->get('user');
            $idCargo = (int)Yii::$app->request->get('cargo');
            $file = File::findFile($idUser, $idCargo);
            $model = Cargo::findCargoById($idCargo);
            $mailer = new Mailer();
            if ($model->load(Yii::$app->request->post())) {
                // Для смены статуса
                if ($model->validate()) {
                    $data = Yii::$app->request->post('Cargo');
                    $order = Html::encode($data['order_status']);
                    $payment = Html::encode($data['payment_cond']);
                    if (Cargo::setStatus($order, $payment, $model->id)) {
                        Yii::$app->session->setFlash('success', 'Статус накладной успешно изменён.', false);
                    }
                }
            } elseif ($mailer->load(Yii::$app->request->post())) {
                // Для расписания отправки
                $dayData = Yii::$app->request->post('Mailer');
                $dayData['day'] = (int)$dayData['day'];
                if (is_int($dayData['day'])) {
                    if ($mailer->setMailer($idUser, $idCargo, $dayData['day'])) {
                        Yii::$app->session->setFlash('success', 'Уведомление назначено.', false);
                    } else {
                        Yii::$app->session->setFlash('danger', 'Ошибка записи уведомления.', false);
                    }
                } else {
                    Yii::$app->session->setFlash('danger', 'Ошибка записи уведомления.', false);
                }

            }
            $send = Mailer::getMailer($idUser, $idCargo);
            return $this->render('cargo',[
                'model' => $model,
                'file' => $file,
                'send' => $send,
            ]);
        } else {
            return $this->redirect('index',302);
        }
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
    public function actionRestore()
    {
        $model = new User();
        $email = Yii::$app->request->get('email');
        $hash = Yii::$app->request->get('hash');
        $tempUser = $model->findForRestore($hash);
        $postData = Yii::$app->request->post();
        // Смена пароля
        if (Yii::$app->request->get('restore') && $tempUser->email === $email && $tempUser->hash === $hash) {
            return $this->restore($email, $hash);
        }
        // Запрос на сброс пароля поступил
        if (Yii::$app->request->post()) {
            return $this->queryRestore($model);
        }
        // Вывод формы на сброс
        return $this->render('restore', [
            'model' => $model,
            'regim' => 1
        ]);
    }
    /**
     * Действия для сброса пароля
     * @method restore
     * @param  email  $email
     * @param  hash  $hash
     * @return raw        view
     */
    public function restore($email, $hash)
    {
        $model = new RegisterUser();
        $postData = Yii::$app->request->post('RegisterUser');
        if ($postData) {
            if ($postData['password'] !== $postData['vpass']) {
                Yii::$app->session->setFlash('danger', 'Пароли должны совпадать.', false);
                return $this->viewRestore($model, $email, $hash);
            }
            $resultRestore = RegisterUser::restorePassword($postData['password'], $postData['email'], $postData['hash']);
            if ($resultRestore) {
                Yii::$app->session->setFlash('success', 'Пароль успешно сброшен.', false);
                // Здесь! TODO: Перенаправление на другой action
                return $this->redirect(['/lk/lk/index'],302);
            } else {
                Yii::$app->session->setFlash('danger', 'Ошибка сброса пароля.', false);
            }
            $model = new LoginForm();
            return $this->render('login', [
                'model' => $model,
            ]);
        }
        return $this->viewRestore($model, $email, $hash);
    }
    /**
     * Запрос на восставноление пароля
     * @method queryRestore
     * @param  object       $model User()
     * @return raw          view
     */
    public function queryRestore($model)
    {
        $data = Yii::$app->request->post('User');
        if ($model = $model->findByEmail($data['email'])) {
            if ($model->setHash($model->id, $model->email, $model->password)) {
                if ($model->sendEmailRestore($user->email, $model->hash)) {
                    Yii::$app->session->setFlash('success', 'Вам было отправлено письмо.', false);
                } else {
                    Yii::$app->session->setFlash('danger', 'Ошибка отправки сообщения!', false);
                }
            } else {
                Yii::$app->session->setFlash('danger', 'Ошибка ввода данных!', false);
            }
        } else {
            Yii::$app->session->setFlash('danger', 'Указанного email не существует.', false);
        }
        return $this->render('restore', [
            'model' => $model,
            'regim' => 1
        ]);
    }

    public function viewRestore ($model, $email, $hash)
    {
        return $this->render('restore', [
            'model' => $model,
            'email' => $email,
            'hash' => $hash,
            'regim' => 2
        ]);
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

    public function getAllMember()
    {
        $id = Yii::$app->user->identity->id;
        $user = new User();
        return (new Query())
            ->select('id')
            ->from('{{%user}}')
            ->orderBy('id')
            ->where('id!=:id AND role!=:role', [':id' => $id, ':role' => 'manager'])
            ->all();
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
    public function isNewUser ()
    {
        if (Yii::$app->request->get('add-user') && Yii::$app->user->identity->id) {
            return true;
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
                    $user['id_manager'] = Html::encode($model->id_manager);
                    $res = RegisterUser::registerUser($user);
                    // Отправить письмо при регистрации
                    if (is_int($res)) {
                        Yii::$app->session->setFlash('success', 'Регистрация прошла успешно.', false);
                        $this->sendMail($user);
                        // Авторизуем если не менеджер
                        if (!Yii::$app->user->identity) {
                            $user = new User();
                            Yii::$app->user->login($user->findByEmail($model->email), true ? 3600*24*30 : 0);
                        }
                        // Отправить письмо при регистрации
                        return $this->redirect('index',302);
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
     * TODO: Удаление накладной
     * Обработка и удаление накладной
     * @method actionDeleteCargo
     * @return bool Удалили?
     */
    public function actionDeleteCargo () {
        if (Yii::$app->request->post()) {
            $cargo = new Cargo();
            $file = new File();
            $idCargo = Yii::$app->request->get('cargo');
            $idUser = Yii::$app->request->get('user');
            // $userChild = User::findById($idUser);
            // $cargoData = $cargo->findById($idUser);
            $resDelFile = $file->delFileAndRecord($idUser, $idCargo);
            if ($resDelFile) {
                if ($cargo->delCargo($idUser, $idCargo)) {
                    Yii::$app->getSession()->setFlash('success', 'Накладная успешно удалена');
                } else {
                    Yii::$app->getSession()->setFlash('danger', 'Ошибка удаления накладной');
                }
            } else {
                Yii::$app->getSession()->setFlash('danger', 'Ошибка удаления накладной');
            }
            return $this->redirect(['index', 'user' => $idUser], 302);
        }
    }
    /**
     * Отправка письма при регистрации
     * @return [type] [description]
     */
    public function sendMail ($user)
    {
        Yii::$app->mailer->compose('register', [
            'model' => $user
        ])
            ->setFrom('developitb@yandex.ru')
            ->setTo($user['email'])
            ->setSubject('Регистрация пользователя')
            ->send();
    }
    public function parseXlsx ($excel, $id)
    {
        $data = [];
        $data['id_user'] = $id;
        $cell = $excel->getActiveSheet()->getCell('H4');
        $data['id_cargo'] = $cell->getValue();
        $cell = $excel->getActiveSheet()->getCell('E10');
        $data['destination'] = $cell->getValue();

        $cell = $excel->getActiveSheet()->getCell('Q9');
        $data['date_depart'] = date("d.m.Y", strtotime($cell->getValue()));
        if ($data['date_depart'] == '01.01.1970') {
            $data['date_depart'] = $cell->getValue();
            $data['date_depart'] = date('d.m.Y', \PHPExcel_Shared_Date::ExcelToPHP($data['date_depart']));
        }
        $cell = $excel->getActiveSheet()->getCell('Q10');
        $data['date_arrival'] = date("d.m.Y", strtotime($cell->getValue()));
        if ($data['date_arrival'] == '01.01.1970') {
            $data['date_arrival'] = $cell->getValue();
            $data['date_arrival'] = date('d.m.Y', \PHPExcel_Shared_Date::ExcelToPHP($data['date_arrival']));
        }
        $cell = $excel->getActiveSheet()->getCell('M12');
        $data['weight'] = $cell->getValue();
        $cell = $excel->getActiveSheet()->getCell('K12');
        $data['amount'] = $cell->getValue();
        $cell = $excel->getActiveSheet()->getCell('E12');
        $data['places'] = $cell->getValue();
        $cell = $excel->getActiveSheet()->getCell('O12');
        $data['rate'] = $cell->getValue();
        $cell = $excel->getActiveSheet()->getCell('F29');
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
