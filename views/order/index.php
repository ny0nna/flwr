<?php

use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'Заказ';
$this->params['breadcrumbs'][] = $this->title;
$id_user=Yii::$app->user->id;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if (Yii::$app->user->identity->is_admin==1)
    
    echo"<p>",
         Html::a('Создать', ['create'], ['class' => 'btn btn-success']),
    "</p>"
    ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute'=>'Товар', 'value'=> function($data){return
                $data->getProd()->One()->name;}],
            ['attribute'=>'Стоимость', 'value'=> function($data){return
                $data->getProd()->One()->price;}],
            'count',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_chart' => $model->id_chart]);

                }
            ],
            ['attribute'=>'Статус', 'value'=> 'status'],
            'reason' => 'Комментарий',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_order' => $model->id_order]);
                 }
            ],
        ],
    ]);

    ?>
    <p><?= Html::a('В корзину', [ 'chart/index?ChartSearch[id_order]=&ChartSearch[id_user]='.$id_user], [
            'class' => 'btn btn-success',
        ])?>
    <?= Html::a('Оформить заказ', [ '/'], [
            'class' => 'btn btn-primary',
        ])?></p>

</div>
