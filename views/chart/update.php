<?php

use yii\helpers\Html;
$id_user=Yii::$app->user->id;
/** @var yii\web\View $this */
/** @var app\models\Chart $model */
//$this->title = 'Update Chart: ' . $model->id_chart;
$this->params['breadcrumbs'][] = ['label' => 'Корзина', 'url' => ['chart/index?ChartSearch[id_chart]=&ChartSearch[id_user]='.$id_user]];
//$this->params['breadcrumbs'][] = ['label' => $model->id_chart, 'url' => ['view', 'id_chart' => $model->id_chart]];
$this->params['breadcrumbs'][] = 'Количество';
?>
<div class="chart-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
