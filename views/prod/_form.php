<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
/** @var yii\web\View $this */
/** @var app\models\Prod $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="prod-form">

    <?php $form = ActiveForm::begin();
    $li=['dropdown-menu']; $categories=\app\models\Category::find()->all();
    foreach ($categories as $category)
    {
        $li[$category->id_cat]=$category->cat;
    }


    ?>



    <?= $form->field($model, 'photo')->fileInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_cat')->dropDownList($li)?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <div class="form-group">
        <br>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
