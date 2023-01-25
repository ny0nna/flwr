<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\OrderSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_order') ?>

    <?= $form->field($model, 'id_chart') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_prod') ?>

    <?=  $form->field($model, 'Количество') ?>

    <?=  $form->field($model, 'Дата завоза') ?>

    <?php echo $form->field($model, 'Статус') ?>

    <?php echo $form->field($model, 'Комментарий') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?//= Html::resetButton('Сбросить', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
