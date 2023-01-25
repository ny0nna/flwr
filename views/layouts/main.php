<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use app\models\User;

AppAsset::register($this);
$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

$id_user=Yii::$app->user->id;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">

    <?php

    if (Yii::$app->user->isGuest){
        $items=[
            ['label' => 'Каталог', 'url' => ['/prod/catalog']],
            ['label' => 'О нас', 'url' => ['/site/about']],
            ['label' => 'Где нас найти?', 'url' => ['/site/contact']],
            ['label' => 'Регистрация', 'url' => ['/user/create']],
            ['label' => 'Авторизация', 'url' => ['/site/login']]
        ];}
    else {
        Yii::$app->user->identity->is_admin==1 ?
            ( $items=[
                ['label' => 'Панель администратора', 'url' => ['/admin/index']],
                //['label' => 'Каталог', 'url' => ['/prod/catalog']],
                ['label' => 'О нас', 'url' => ['/site/about']],
                ['label' => 'Где нас найти?', 'url' => ['/site/contact']],
                ['label' => 'Заказы', 'url' => ['/order/index']],])

            :
            ($items=[
                ['label' => 'Каталог', 'url' => ['/prod/catalog']],
                ['label' => 'О нас', 'url' => ['/site/about']],
                ['label' => 'Где нас найти?', 'url' => ['/site/contact']],
                ['label' => 'Корзина', 'url' => ['/chart/index?ChartSearch[id_chart]=&ChartSearch[id_user]='.$id_user]],
                ['label' => 'Заказ', 'url' => ['/order/index?OrderSearch[id_order]=&OrderSearch[id_user]='.$id_user]],
                //['label' => 'Регистрация', 'url' => ['/user/create']],
                //['label' => 'Авторизация', 'url' => ['/site/login']]
            ]);

        array_push($items, '<li class="nav-item">'
     . Html::beginForm(['/site/logout'])
     . Html::submitButton(
         'Выйти (' . Yii::$app->user->identity->login . ')',
         ['class' => 'nav-link btn btn-link logout']
     )
     . Html::endForm()
     . '</li>');
 }
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark
fixed-top']
    ]);
    echo
    Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $items
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
<script src="/JS/addProd.js"></script>
    <script src="/JS/addChart.js"></script>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
