<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CargoForm extends Model
{
    public $name = '';
    public $email = '';
    public $idCargo;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['idCargo'], 'required'],
            ['email', 'email'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'email' => 'Email',
            'idCargo' => 'Id Накладной',
            'verifyCode' => 'Captcha',
        ];
    }

    /**
     * Отправка данных при запросе статуса накладной
     * @return str|bool
     */
    public function contact()
    {
        $user = User::find()->where(['email' => $this->email])->one();
        $status = Cargo::find()->where(['id_cargo' => $this->idCargo, 'id_user' => $user->id])->one();
        if ($status) {
            return $status;
        } else {
            return false;
        }
    }

    public static function getStatus ($id)
    {
        return Cargo::find()->where(['id_cargo' => $id])->one();
    }
}
