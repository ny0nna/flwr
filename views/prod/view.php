<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Prod $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Prods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="prod-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_prod' => $model->id_prod], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_prod' => $model->id_prod], [
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
            'id_prod',
            'photo',
            'name',
            'count',
            'price',
            'country',
            'id_cat',
            'color',
            'time',
        ],
    ]) ?>

</div>
