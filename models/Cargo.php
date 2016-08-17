<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cargo}}".
 *
 * @property integer $id
 * @property string $id_cargo
 * @property integer $id_user
 * @property string $destination
 * @property string $date_depart
 * @property string $date_arrival
 * @property double $weight
 * @property double $amount
 * @property integer $places
 * @property double $rate
 * @property double $cost
 * @property string $payment_cond
 * @property string $order_status
 */
class Cargo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cargo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'places'], 'integer'],
            [['date_depart', 'date_arrival'], 'safe'],
            [['weight', 'amount', 'rate', 'cost'], 'number'],
            [['order_status'], 'string'],
            [['id_cargo'], 'string', 'max' => 50],
            [['destination'], 'string', 'max' => 255],
            [['payment_cond'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_cargo' => 'Номер груза',
            'id_user' => 'Id User',
            'destination' => 'Пункт назначения',
            'date_depart' => 'Дата отправки',
            'date_arrival' => 'Ориентировочная дата прибытия',
            'weight' => 'Вес',
            'amount' => 'Объём',
            'places' => 'Мест',
            'rate' => 'Савка, дол',
            'cost' => 'Общая стоимость',
            'payment_cond' => 'Состояние оплаты',
            'order_status' => 'Состояние заказа',
        ];
    }
    /**
     * Добавдение новой накладной
     * @method setCargo
     * @param  [type]   $data [description]
     */
    public function setCargo ($data)
    {
        // Записываем накладную
        return Yii::$app->db->createCommand()->insert('{{%cargo}}', [
            'id_cargo' => !empty($data['id_cargo']) ? $data['id_cargo'] : 'false',
            'id_user' => !empty($data['id_user']) ? $data['id_user'] : 'false',
            'destination' => !empty($data['destination']) ? $data['destination'] : 'false2',
            'date_depart' => !empty($data['date_depart']) ? $data['date_depart'] : '0',
            'date_arrival' => !empty($data['date_arrival']) ? $data['date_arrival'] : '0',
            'weight' => !empty($data['weight']) ? $data['weight'] : 0,
            'amount' => !empty($data['amount']) ? $data['amount'] : 0,
            'places' => !empty($data['places']) ? $data['places'] : 0,
            'rate' => !empty($data['rate']) ? $data['rate'] : 0,
            'cost' => !empty($data['cost']) ? $data['cost'] : 0
        ])->execute();
    }
    /**
     * Поиск накладной
     * @method findFile
     * @param  [type]   $email [description]
     * @return [type]          [description]
     */
    public static function findCargo($id, $fileName)
    {
        return static::findOne(['id_user' => $id, 'id_cargo' => $fileName]);
    }
    public static function findCargoById ($id)
    {
        return static::findOne(['id' => $id]);
    }
    /**
     * Поиск накладных для отдельного юзера
     * @method findById
     * @param  [type]   $id [description]
     * @return [type]       [description]
     */
    public static function findById ($id)
    {
        return static::findAll(['id_user' => $id]);
    }
    /**
     * [updateCargo description]
     * @method updateCargo
     * @param  [type]      $data [description]
     * @return [type]            [description]
     */
    public function updateCargo ($data, $id, $idCargo)
    {
        // Записываем накладную
        return Yii::$app->db->createCommand()->update('{{%cargo}}', [
            'id_cargo' => !empty($data['id_cargo']) ? $data['id_cargo'] : 'false',
            'id_user' => !empty($data['id_user']) ? $data['id_user'] : 'false',
            'destination' => !empty($data['destination']) ? $data['destination'] : 'false2',
            'date_depart' => !empty($data['date_depart']) ? $data['date_depart'] : '0',
            'date_arrival' => !empty($data['date_arrival']) ? $data['date_arrival'] : '0',
            'weight' => !empty($data['weight']) ? $data['weight'] : 0,
            'amount' => !empty($data['amount']) ? $data['amount'] : 0,
            'places' => !empty($data['places']) ? $data['places'] : 0,
            'rate' => !empty($data['rate']) ? $data['rate'] : 0,
            'cost' => !empty($data['cost']) ? $data['cost'] : 0,
        ], ['id_user' => $id, 'id_cargo' => $idCargo])->execute();
    }
    /**
     * Изменение статуса накладной
     * @method setStatus
     * @param  [type]    $order   [description]
     * @param  [type]    $payment [description]
     * @param  [type]    $id      [description]
     */
    public static function setStatus ($order, $payment, $id)
    {
        return Yii::$app->db->createCommand()->update('{{%cargo}}', ['order_status' => $order, 'payment_cond' => $payment], "id = {$id}")->execute();
    }
    /**
     * Удаление накладной
     * @method delCargo
     * @return [type]   [description]
     */
    public function delCargo($idUser, $idCargo)
    {
        return Yii::$app->db->createCommand()->delete('{{%cargo}}', ['id_user' => $idUser, 'id' => $idCargo])->execute();
    }
}
