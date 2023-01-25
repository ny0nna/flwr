<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Chart;
use app\models\Prod;
/** @var yii\web\View $this */
/** @var app\models\Chart $model */
/** @var yii\widgets\ActiveForm $form */
$id_user=Yii::$app->user->id;
?>

<div class="chart-form">

    <?php $form = ActiveForm::begin(); ?>



    <h1><?= $form->field($model, 'count')->textInput()?></h1>

    <div class="form-group">
        <br>
        <?=
         Html::submitButton('Сохранить',['class' => 'btn btn-success']);
        ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
