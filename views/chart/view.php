<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Chart $model */

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = ['label' => 'Корзина', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="chart-view">



    <p>

        <?= Html::a('Изменить количество', ['update', 'id_chart' => $model->id_chart], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id_chart' => $model->id_chart], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_chart',
            //'id_user',
            //'id_prod',
            ['attribute'=>'Наименование товара', 'value'=> function($data){return
                $data->getProd()->One()->name;}],
            'count',
        ],
    ]) ?>

</div>
