<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%settings}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $key
 * @property string $value
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%settings}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['key', 'value'], 'required'],
            [['key'], 'string', 'max' => 50],
            [['key'], 'unique'],
            [['value'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Ключ (латиница)',
            'value' => 'Значение',
        ];
    }

    /**
     * @inheritdoc
     * @return SettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SettingsQuery(get_called_class());
    }
    /**
     * [getOption description]
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function getOption($key)
    {
        return (new \yii\db\Query())
            ->select(['value'])
            ->from('{{%settings}}')
            ->where(['key' => $key])
            ->one();
    }
}
