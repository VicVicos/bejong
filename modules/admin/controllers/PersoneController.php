<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Persone;
use app\models\SearchPersone;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * PersoneController implements the CRUD actions for Persone model.
 */
class PersoneController extends Controller
{
    public $layout = 'admin';
    /**
     * @inheritdoc
     */
     public function behaviors()
     {
         return [
             'access' => [
                 'class' => AccessControl::className(),
                 'only' => ['index', 'create', 'update', 'view'],
                 'rules' => [
                     [
                         'actions' => ['index', 'create', 'view', 'update'],
                         'allow' => true,
                         'roles' => ['?'],
                         'matchCallback' => function () {
                             return false;
                         }
                     ],
                     [
                         'actions' => ['index', 'create', 'view', 'update'],
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
     * Lists all Persone models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchPersone();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Persone model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Persone model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Persone();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Persone model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Persone model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Persone model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Persone the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Persone::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
