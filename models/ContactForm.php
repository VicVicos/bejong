<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $contact;
    public $email;
    public $address;
    public $body;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'email', 'address', 'contact', 'body'], 'required'],
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
            'contact' => 'Телефон',
            'address' => 'Адрес',
            'body' => 'Сообщение',
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact()
    {
        $send = Yii::$app->mailer->compose('body')
            ->setFrom('developitb@yandex.ru')
            ->setTo($this->email)
            ->setSubject('Регистрация пользователя')
            ->send();
        if ($send) {
            return true;
        } else {
            return false;
        }
    }
}
