<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%file}}".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $file_name
 */
class File extends \yii\db\ActiveRecord
{
    public $xlsxFile;
    public $user;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%file}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user'], 'integer'],
            [['xlsxFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'file_name' => 'File Name',
            'xlsxFile' => 'file'
        ];
    }
    public function upload($data)
    {
        $path = Yii::$app->params['basePath'];
        if ($this->validate()) {
            if (file_exists($path . '/web/xlsxfile/' . $data['userId'])) {
            } else {
                mkdir($path . '/web/xlsxfile/' . $data['userId'], 0775, true);
            }
            $this->xlsxFile->saveAs($path . '/web/xlsxfile/' . $data['userId'] . '/' . $this->xlsxFile->baseName . '.' . $this->xlsxFile->extension, false);
            return true;
        } else {
            return false;
        }
    }
}
