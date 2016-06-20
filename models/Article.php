<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 * Модель статей
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $type
 * @property string $intro
 * @property string $text
 * @property string $img
 * @property string $excerpt
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['title', 'alias', 'intro', 'img', 'excerpt'], 'string', 'max' => 255],
        ];
    }

    /**
     * @ Id
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'alias' => 'Alias',
            'type' => 'Type',
            'intro' => 'Intro',
            'text' => 'Text',
            'img' => 'Img',
            'excerpt' => 'Excerpt',
        ];
    }
}
