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
     * [beforeSave description]
     * @method beforeSave
     * @param  [type]     $insert [description]
     * @return [type]             [description]
     */
    public function beforeSave($insert)
    {
        $user = Yii::$app->request->post();
        var_dump($user);
        if (parent::beforeSave($insert)) {
            // ...custom code here...
            return true;
        } else {
            return false;
        }
    }
}
