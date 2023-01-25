<?php

namespace app\controllers;

use app\models\Chart;
use app\models\ChartSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use app\models\Prod;


/**
 * ChartController implements the CRUD actions for Chart model.
 */

class ChartController extends Controller
{


    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Chart models.
     *
     * @return string
     */


    public function actionIndex()
    {
        $searchModel = new ChartSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function beforeAction($action)
    {

        /*if ((Yii::$app->user->isGuest))
        {
            $this->redirect(['site/login']);


            return false;
        } else return true;*/
        if ($action->id=='create') $this->enableCsrfValidation=false;
        return parent::beforeAction($action);
    }

    /**
     * Displays a single Chart model.
     * @param int $id_user Id User
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionView($id_chart)
    {
        if ((Yii::$app->user->identity->is_admin==0)) {
            return $this->render('view', [
                'model' => $this->findModel($id_chart) /*$this->redirect(['chart/view'])*/,
            ]);
        } else $this->redirect(['site/login']);
        return false;
    }

    /**
     * Creates a new Chart model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        /*$model = new Chart();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_chart' => $model->id_chart]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);*/

        $id_prod = Yii::$app->request->post('id_prod');
        $items=Yii::$app->request->post('count');
        $prod = Prod::findOne($id_prod);
        if (!$prod) return false;
        if ($prod->count > 0) {
            $prod->count -= $items;
            $prod->save(false);
            $model = Chart::find()->where(['id_user' => Yii::$app->user->identity->id_user])->andWhere(['id_prod' => $id_prod])->one();
         if ($model) {
             $model->count += $items;
             $model->save();
             return $prod->count;
         }

         $model = new Chart();
         $model->id_user = Yii::$app->user->identity->id_user;
         $model->id_prod = $prod->id_prod;
         $model->count = $items;
         if ($model->save(false)) return $prod->count;
         }
        return 'false';
    }

    /**
     * Updates an existing Chart model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_chart Id Chart
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    /* @var  */
    public function actionUpdate($id_chart)
    {
        $model = $this->findModel($id_chart);
        $prod= Prod::findOne($model->id_prod);
        $cound=$prod->count;


        if ((Yii::$app->user->identity->is_admin==0)&&($this->request->isPost && $model->load($this->request->post()) && $model->save())) {

            if (($this->request->isPost)&&($model->count>$cound)){
                return 'Желаемое число товара превышает наличие: '.$cound;

            }
            else
            return $this->redirect(['chart/index?ChartSearch[id_chart]=&ChartSearch[id_user]='.Yii::$app->user->identity->id_user]);

        }

        return $this->render('update', [
            'model' => $model,
        ]);


    }

    /**
     * Deletes an existing Chart model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_chart Id Chart
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_chart)
    {
        $this->findModel($id_chart)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Chart model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_chart Id Chart
     * @return Chart the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_chart)
    {
        if (($model = Chart::findOne(['id_chart' => $id_chart])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
