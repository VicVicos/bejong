<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Mailer;

// TODO: Упарвление менеджерами

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public $layout = 'admin';
    /**
     * [behaviors description]
     * @method behaviors
     * @return [type]    [description]
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?'],
                        'matchCallback' => function () {
                            return false;
                        }
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function () {
                            if (Yii::$app->user->identity->role === 'admin') {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
