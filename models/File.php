<?php
// TODO: Update file name
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
    /**
     * Добавляем новую накладную
     * @method setFile
     * @param  [type]  $id       [description]
     * @param  [type]  $fileName [description]
     */
    public function setFile($id, $fileName)
    {
        return Yii::$app->db->createCommand()->insert('{{%file}}', [
            'id_user' => $id,
            'file_name' => $fileName,
        ])->execute();
    }
    /**
     * Поиск файла
     * @method findFile
     * @param  [type]   $email [description]
     * @return [type]          [description]
     */
    public static function findFile($email)
    {
        return static::findOne(['id_user' => $id, 'file_name' => $fileName]);
    }
}
