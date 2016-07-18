<?php

namespace app\models;

use Yii;
use yii\base\Model;

use yii\helpers\Html;
/**
 * ContactForm is the model behind the contact form.
 */
class ReviewForm extends Model
{
    public $title;
    public $type = 'review';
    public $status = 'disabled';
    public $intro;
    public $text;
    public $img;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['title', 'intro', 'text'], 'required'],
            [['img'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif'],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Имя',
            'intro' => 'Должность',
            'text' => 'Отзыв',
            'img' => 'Фото',
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
        $send = Yii::$app->mailer->compose('review')
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo(Yii::$app->params['adminEmail'])
            ->setSubject('Новый отзыв с сайта')
            ->send();
        if ($send) {
            return true;
        } else {
            return false;
        }
    }
    public function setReview() {
        return Yii::$app->db->createCommand()->insert('{{%article}}', [
                'title' => Html::encode($this->title),
                'type' => Html::encode($this->type),
                'status' => Html::encode($this->status),
                'intro' => Html::encode($this->intro),
                'text' => Html::encode($this->text),
                'img' => Html::encode($this->img),
            ])->execute();
    }
    /**
     * Upload img
     * @method upload
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function uploadImg()
    {
        $path = Yii::$app->params['basePath'];
        $tempName = substr(base64_encode($this->verifyCode . time()), 0, 10);
        $this->img->name = $tempName . $this->img->name;
        if (!file_exists($path . '/web/img/review/')) {
            mkdir($path . '/web/img/review/', 0775, true);
        }
        $fileName = $tempName . '.' . $this->img->extension;
        if ($this->img->saveAs($path . '/web/img/review/' . $fileName, false)) {
            return $fileName;
        } else {
            return false;
        }
    }
}
