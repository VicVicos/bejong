<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CargoForm extends Model
{
    public $name;
    public $email;
    public $idCargo;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'email', 'idCargo'], 'required'],
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
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact()
    {
        $user = User::find()->where(['email' => $this->email])->one();
        $status = Cargo::find()->where(['id_cargo' => $this->idCargo, 'id_user' => $user->id])->one();
        $send = Yii::$app->mailer->compose('cargo')
            ->setFrom('developitb@yandex.ru')
            ->setTo($this->email)
            ->setSubject('Проврка груза' . $this->idCargo)
            ->send();
        if ($send && $status) {
            return $status;
        } else {
            return false;
        }
    }
}
