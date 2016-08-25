<?php
namespace app\models;
use Yii;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    private $hash;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'contact','email'], 'required'],
            [['id'], 'integer'],
            [['id'], 'unique', 'targetAttribute' => ['id']],
            [['email'], 'unique', 'targetAttribute' => ['email']],
            [['name'], 'string', 'max'=>55],
            [['email'],'email']
            // 'unique'
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'contact' => 'Телефон',
            'email' => 'Email',
            'address' => 'Адрес',
            'password' => 'Пароль',
            'status' => 'Статус',
            'created' => 'Зарегестрирован',
            'role' => 'Права',
            'id_manager' => 'Менеджер'
        ];
    }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by email
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }
    /**
     * Поиск юзера для сброса пароля
     * @method findByForRestore
     * @param  str           $email
     * @param  str           $hash
     * @return object||bool  Объект с данными юзера или false
     */
    public static function findForRestore($hash)
    {
        return static::findOne(['hash' => $hash]);
    }
    /**
     * Find User by Id
     * @method findById
     * @param  [type]   $id [description]
     * @return [type]       [description]
     */
    public static function findById($id)
    {
        return static::findOne(['id' => $id]);
    }
    /**
     * GetUser
     * @method getUser
     * @return [type]  [description]
     */
    public function getUser()
    {
        if ($this->user === false) {
            //Находим пользователя в БД по логину или эл.почте
            $this->user = User::find()
                ->andWhere(['email' => $this->email])
                ->one();
            //Проверяем права доступа, если нет, то делаем вид,
            //что пользователь не найден.
            if (!Yii::$app->user->can('admin', ['admin' => $this->user])) {
                $this->user = null;
            }
        }
        return $this->user;
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    /**
     * Получение hash для восстановления пароля
     * @method getHash
     * @return [type]  [description]
     */
    public function getHash()
    {
        return $this->hash;
    }
    /**
     * Установка hash
     * @method setHash
     * @param  [type]  $id       [description]
     * @param  [type]  $email    [description]
     * @param  [type]  $password [description]
     */
    public function setHash($id, $email, $password)
    {
        $this->hash = md5($email . $password . time());
        return Yii::$app->db->createCommand()->update('{{%user}}', [
            'hash' => $this->hash,
        ], ['id' => $id])->execute();
    }
    /**
     * Отправка сообщения при запросе о смене пароля
     * @method sendEmailRestore
     * @return bool
     */
    public function sendEmailRestore()
    {
        $send = Yii::$app->mailer->compose('restore', [
            'hash' => $this->hash,
            'email' => $this->email
        ])
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo($this->email)
            ->setSubject('Запрос на восстановление пароля')
            ->send();
        if ($send) {
            return true;
        } else {
            return false;
        }
    }
}
