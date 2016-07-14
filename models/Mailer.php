<?php
namespace app\models;

use Yii;
use yii\db\Query;
/**
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_cargo
 * @property string $date_send date
 */
class Mailer extends \yii\db\ActiveRecord
{
    public $day = 0;

    public static function tableName()
    {
        return '{{%mailer}}';
    }
    public function rules()
    {
        return [
            [['id_user', 'id_cargo'], 'integer'],
            ['date_send', 'date'],
        ];
    }
    public function getCargo()
    {
        return $this->hasOne(Cargo::className(), ['id' => 'id_cargo']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
    public function attributeLabels ()
    {
        return [
            'day' => 'Напомнить произвести оплату'
        ];
    }
    /**
     * Устанавливаем письма для отправки на будущее
     * @method setMailer
     * @return bool
     */
    public function setMailer ($idUser, $idCargo, $date)
    {
        $now = new \DateTime('now');
        $now->modify('+' . $date . 'day');
        $this->date_send = $now->format('Y-m-d');

        return Yii::$app->db->createCommand()->insert('{{%mailer}}', [
                'id_user' => $idUser,
                'id_cargo' => $idCargo,
                'date_send' => $now->format('Y-m-d'),
            ])->execute();
    }
    /**
     * Получам письма для отправки сегодня
     * @method getMailer
     * @return bool
     */
    public static function getMailer ($idUser, $idCargo)
    {
        return static::find()->where(['id_user' => $idUser, 'id_cargo' => $idCargo])->one();
    }

    public static function findByDate ($now)
    {
        $query = new Query();
        $query->select(['mail.id_user', 'mail.id_cargo', 'mail.date_send', 'user.name', 'user.email', 'cargo.id_cargo AS cargo_name'])
            ->from ([Mailer::tableName().' mail'])
            ->leftJoin(User::tableName().' user','mail.id_user = user.id')
            ->leftJoin(Cargo::tableName(). ' cargo','mail.id_cargo = cargo.id')
            ->where(['mail.date_send' => $now]);
            return $query->all();
    }

    public function deleteDate ($id, $now)
    {
        Yii::$app->db->createCommand()->delete('{{%mailer}}', ['id_user' => $id, 'date_send' => $now])->execute();
    }
}
