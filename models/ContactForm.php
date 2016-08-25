<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $weight;
    public $width;
    public $length;
    public $height;
    public $type;
    public $name;
    public $email;
    public $contact;
    public $verifyCode;
    // : вес, ширина, длина, высота, тип груза, имя и контактный телефон

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['weight', 'width', 'length', 'height', 'type', 'name', 'contact'], 'string'],
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
            'weight' => 'Вес',
            'width' => 'Ширина',
            'length' => 'Длина',
            'height' => 'Высота',
            'type' => 'Наименование товара',
            'name' => 'Имя',
            'email' => 'Email',
            'contact' => 'Телефон',
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
        $send = Yii::$app->mailer->compose('application')
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo($this->email)
            ->setSubject('Спасибо за обращение!')
            ->send();
        if ($send) {
            return Yii::$app->mailer->compose('calc', [
                'model' => $this
            ])
                ->setFrom(Yii::$app->params['adminEmail'])
                ->setTo(Yii::$app->params['sendEmail'])
                ->setSubject('Заказ расчёта с сайта')
                ->send();
        } else {
            return false;
        }
    }
}
