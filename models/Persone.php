<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%persone}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $position
 * @property string $text
 * @property string $img
 */
class Persone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%persone}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'position', 'img'], 'string', 'max' => 255],
            [['text'], 'string', 'max' => 21000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'position' => 'Position',
            'text' => 'Text',
            'img' => 'Img',
        ];
    }
}
