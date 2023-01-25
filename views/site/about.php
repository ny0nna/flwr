<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use app\models\Prod;

$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

<div class="logo">
<img src="\rootFiles\logo.png" class="img-fluid" alt="logo" style="height: 50px;width: 50px;">
    <b>FLWR</b> - Flower Shop Online. Our purpose is working for onigiri. That's all! Thank you very much and give me some <B>MONEY FOR ONIGIRI SUSHI AND 300$ TO GACHI AD</B>
</div>


    <?php $prods=Prod::find()->orderBy(['time'=>SORT_DESC])->limit(5)->all();
    $items=[];

    foreach ($prods as $prod){
        $items[]="<div class='bg-gray m-1 p-5 d-flex flex-column justify-content-center'>
    <h1 class='text-primary text-center m-2'>{$prod->name}</h1>
    <img class='m-auto' style='height: 250px; width: 250px;' src='{$prod->photo}' alt='photo'/></div>";
    }
    echo yii\bootstrap5\Carousel::widget(['items'=>$items]);
    ?>
    <br>
    <h4 class="text-center">
        Мы работаем, честно-честно
    </h4>

</div>
