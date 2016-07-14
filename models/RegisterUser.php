<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $contact
 * @property string $email
 * @property string $address
 * @property string $password
 * @property string $status
 * @property string $created
 * @property string $role
 * @property integer $id_manager
 */
class RegisterUser extends \yii\db\ActiveRecord
{
    public $vpass = '';
    public $id_manager = 0;
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
            [['status', 'role', 'vpass'], 'string'],
            [['created'], 'safe'],
            [['id_manager'], 'integer'],
            [['password', 'vpass'], 'string', 'min' => 6],
            [['email', 'password', 'name', 'contact', 'vpass'], 'required'],
            [['name', 'contact', 'email', 'password'], 'string', 'max' => 255],
            [['address'], 'string', 'max' => 2550],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'contact' => 'Телефоон',
            'email' => 'Email',
            'address' => 'Адрес',
            'password' => 'Password',
            'vpass' => 'Повтор пароля',
            'status' => 'Статус',
            'created' => 'Зарегестрирован',
            'role' => 'Права',
            'id_manager' => 'Id Менеджера',
        ];
    }
    /**
     * Регистрируем пользователя
     * @method registerUser
     * @param  array       $model Данные формы
     * @return [type]              [description]
     */
    public function registerUser ($user)
    {
        $options = [
            'cost' => 12,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        $hash = password_hash($user['pass'], PASSWORD_BCRYPT);

        return Yii::$app->db->createCommand()->insert('{{%user}}', [
            'name' => $user['name'],
            'password' => $hash,
            'email' => $user['email'],
            'contact' => $user['contact'],
            'address' => $user['address'],
            'id_manager' => $user['id_manager']
        ])->execute();
    }
}
