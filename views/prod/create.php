<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Prod $model */

$this->title = 'Создать продукт';
$this->params['breadcrumbs'][] = ['label' => 'Prods', 'url' => ['catalog']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prod-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
