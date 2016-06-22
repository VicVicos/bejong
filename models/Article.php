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
 * @property string $link
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
            [['title', 'alias', 'intro', 'link', 'img', 'excerpt'], 'string', 'max' => 255],
            [['type', 'status'], 'string'],
        ];
    }

    /**
     * @ Id
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'alias' => 'Alias',
            'link' => 'Ссылка',
            'type' => 'Тип',
            'status' => 'Статус',
            'intro' => 'Интро текст',
            'text' => 'Статья',
            'img' => 'Картинка',
            'excerpt' => 'Особое описание',
        ];
    }
    // Методы работы со статьями

    /**
     * TODO: Получать список из базы
     * Получаем типы статей
     * @method getType
     * @return array  Типы статей
     */
    public function getType()
    {
        // SHOW COLUMNS FROM bj_article

    }
    /**
     * Дела перед сохранением статьи
     * @method beforeSave
     * @param  [type]     $insert [description]
     * @return [type]             [description]
     */
    public function beforeSave($insert)
    {
        $art = Yii::$app->request->post('Article');
        $this->type = $art['type'];
        if (parent::beforeSave($insert)) {
            // ...custom code here...
            return true;
        } else {
            return false;
        }
    }
}
