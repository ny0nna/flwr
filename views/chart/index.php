<?php

use app\models\Chart;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Prod;
use app\models\OrderSearch;

/** @var yii\web\View $this */
/** @var app\models\ChartSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\Chart $model */


$id_user=Yii::$app->user->id;
$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chart-index">
    <h1><?= Html::encode($this->title) ?></h1>





    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_chart',
            //'id_user',
            //'id_prod',
             ['attribute'=>'Товар', 'value'=> function($data){return
            $data->getProd()->One()->name;}],
            ['attribute'=>'Стоимость', 'value'=> function($data){return
                $data->getProd()->One()->price;}],

            'count',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Chart $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_chart' => $model->id_chart]);

                 }
            ],
        ],
    ]);
    ?>

    <?php
    //$order=new \app\models\Order();
    //$chart=$dataProvider->getModels();
    $charts = Chart::find()->where(['id_user'=>Yii::$app->user->identity->id_user])->all();
    if (!$charts) return false;
    foreach ($charts as $chart)
    {
        $order=new \app\models\Order();
        $order-> id_user=Yii::$app->user->identity->id_user;
        $order->id_prod=$chart->id_prod;
        $order->count=$chart->count;
        $order->save(false);
        $chart->delete();

    }
    echo "<p
onclick='add_chart({$chart->id_chart})' class='btn btn-primary'>Добавить в корзину</p>";
    ?>
   <?/*php

   Modal::begin([
        'toggleButton' => [
            'label' => 'Оформить',
            'tag' => 'button',
            'class' => 'btn btn-success',
        ],
    ]);

    echo "<div>

    <label>Password:</label>
    <input type='password' id='password' name='password' required>
</div>
<p onclick='modal(password)'>
<input type='button' value='Submit'></p>
</script>
";



    Modal::end();*/ ?>
</div>
