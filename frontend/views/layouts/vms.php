<?php

//use Yii;
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use kartik\nav\NavX;
use common\models\Mainmenu;
use common\components\MainmenuHelper;
use frontend\assets\VmsAsset;
use frontend\assets\FontsAsset;
use frontend\assets\IeAsset;
use frontend\assets\YaMapsAsset;
use frontend\assets\GoogleMapsAsset;



VmsAsset::register($this);
FontsAsset::register($this);
IeAsset::register($this);
YaMapsAsset::register($this);
GoogleMapsAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language ?>">
<head>
    <meta charset="<?=Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=Yii::$app->name ?> - <?= Html::encode($this->title) ?></title>
    <!--link rel="shortcut icon" href=""-->

    <!--link rel="stylesheet" href="css/bootstrap-theme.css"-->

    <!--style>body{padding-top:50px;}.starter-template{padding:40px 15px;text-align:center;}</style-->
<?php $this->head() ?>
</head>

<body>
    <?php $this->BeginBody() ?>

    <?php




    NavBar::begin([
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    echo NavX::widget([
        'options' => [
            'class' => 'nav navbar-nav nav-left',
        ],
        'encodeLabels' => FALSE,
        'activateParents' => TRUE,
        'items' => Mainmenu::viewLeftTopMenuItems(),
    ]);
    ?>

    <a href="<?=Yii::$app->homeUrl ?>" class="logo visible-lg visible-md"><img src="/images/logo_vozn.png" alt="Мемориальный салон ВОЗНЕСЕНИЕ">
                    </a>
    <div id="brand" class="visible-md visible-lg">&nbsp;</div>

<?php

echo NavX::widget([
        'options' => [
            'class' => 'nav navbar-nav nav-right',
        ],
        'encodeLabels' => FALSE,
        'activateParents' => TRUE,
        'items' => Mainmenu::viewRightTopMenuItems(),
    ]);
NavBar::end();

    ?>

<!--    <nav class="navbar navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle  btn-navbar" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                </div>


                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav nav-left">
                        <li><a href="#about">О нас</a></li>
                        <li class="divider"></li>
                        <li><a href="#services">Услуги</a></li>
                    </ul>


                    <!--ul class="nav navbar-nav nav-right">
                        <li><a href="#catalog">Каталог</a></li>
                        <li><a href="#contacts">Контакты</a></li>
                    </ul>
                </div>
                .nav-collapse

        </div>
        .nav-header
    </nav>-->

    <div class="page-header">
        <div class="container">
            <div id="slogan" class="slogan visible-md visible-lg visible-sm visible-xs-inline-block">
                <img src="/images/slogan.png">
            </div>
            <!--<div class="header-cols">-->
                <div class="left-col">
                    <nav class="nav-side navbar hnav" role="navigation">
                        <div class="navbar-dont-collapse no-toggle">
                            <ul class="nav navbar-nav">
                                <li class="dropdown has-panel">
                                   <a href="#login" area-expanded="false" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp;<span class="hidden-sm hidden-xs">Вход</span>&nbsp;<span class="glyphicon glyphicon-menu-down"></span></a>
                                    <div class="dropdown-menu dropdown-panel arrow-top dropdown-left-xs" data-keep-open="true">
                                        <fieldset>
                                            <form>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                        <input class="form-control" placeholder="Email" type="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                        <input class="form-control" placeholder="Пароль" type="password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="checkbox-inline"><input value="" type="checkbox">Запомнить меня</label>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">Войти</button>
                                            </form>
                                        </fieldset>
                                    </div>
                                </li>
                                <li class="dropdown has-panel">
                                   <a href="#register" area-expanded="false" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-pencil"></span>&nbsp;<span class="hidden-sm hidden-xs">Регистрация</span>&nbsp;<span class="glyphicon glyphicon-menu-down"></span></a>
                                    <div class="dropdown-menu dropdown-panel arrow-top" data-keep-open="true">
                                        <fieldset>
                                            <form>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                        <input class="form-control" placeholder="Email" type="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                        <input class="form-control" placeholder="Пароль" type="password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                                        <input class="form-control" placeholder="Повтор пароля" type="password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="checkbox-inline"><input value="" type="checkbox">Я принимаю правила и условия</label>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block">Зарегистрироваться</button>
                                            </form>
                                        </fieldset>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div id="phone-pic" class="phone-pic">
                        <img src="/images/phone.png">
                    </div>
                    <div id="phone-numb" class="phone-numb">
                        <img src="/images/36.png" alt="+7(905)385-59-51">
                    </div>
                </div>
                <div class="right-col">
                    <form class="header-search">
                        <div class="form-group">
                            <input class="form-control" placeholder="Поиск по каталогу..." type="text">
                            <button class="btn btn-empty"><!--span class="glyphicon glyphicon-search"></span--><img src="/images/search.png"></button>
                        </div>
                    </form>
                    <div id="work-time" class="work-time">
                        <img src="/images/43.png" alt="Мы работаем с 7-00 до 18-00">
                    </div>

                    <div class="shop-cart-panel">
                        <div class="basket">
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#shop_cart">
                                    <div class="basket-icon">
                                        <img src="/images/shopping_trolley.png">
                        <b class="item-count">
                          3
                        </b>
                      </div>
                                    <span class="total-price">
                        21000 р.
                      </span>
                    </a>
                                <div class="dropdown-menu dropdown-panel dropdown-right arrow-top" data-keep-open="true">
                                <section>
                                <ul class="mini-cart">
                                    <li class="clearfix">
                                        <img src="/images/products/memorials/granite/vertikal/%D0%9C%D0%95-26.jpg" alt="">
                                        <div class="text">
                                            <a class="title" href="#product_id">Памятник МЕ-26</a>
                                            <div class="product-price">
                                                1 X 18000 р.
                                                <div class="btn-group">
                                                    <a class="btn btn-primary" href="#edit_basket_item"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-default" href="#delete_item"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <img src="/images/products/grave/krests/73.jpg" alt="">
                                        <div class="text">
                                            <a class="title" href="#product_id">Крест с декором</a>
                                            <div class="product-price">
                                                1 X 1500 р.
                                                <div class="btn-group">
                                                    <a class="btn btn-primary" href="#edit_basket_item"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-default" href="#delete_item"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                     <li class="clearfix">
                                        <img src="/images/products/grave/flowers/121.jpg" alt="">
                                        <div class="text">
                                            <a class="title" href="#product_id">Ветка сирени</a>
                                            <div class="product-price">
                                                1 X 2500 р.
                                                <div class="btn-group">
                                                    <a class="btn btn-primary" href="#edit_basket_item"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-default" href="#delete_item"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                    </section>

                                    <section>
                                       <div class="row grid-10">
                                           <div class="col-md-6">
                                               <a class="btn btn-base btn-block margin-y-5" href="#view_cart">Смотреть <br>корзину</a>
                                           </div>
                                           <div class="col-md-6">
                                               <a class="btn btn-primary btn-block margin-y-5" href="#checkout">Оформить<br> заказ</a>
                                           </div>
                                       </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>

   <?php
   NavBar::begin([
       'options' => [
           'class' => 'navbar navbar-static-top nav-middle',
       ],
   ]);

   echo NavX::widget([
       'options' => [
           'class' => 'navbar-nav nav',
       ],
       'encodeLabels' => FALSE,
       'activateParents' => TRUE,
       'items' => Mainmenu::viewMiddleMenuItems(),
   ]);

   NavBar::end();
   ?>

<!--    <nav class="navbar navbar-static-top nav-middle">
        <div class="navbar-header-middle">
            <div class="container">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav nav">
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#memorials" data-toggle="dropdown">Памятники</a>
                            <ul class="dropdown dropdown-menu">
                                <li class="dropdown dropdown-submenu"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Гранитные</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#granite_subcat_hor">Горизонтальные</a></li>
                                        <li><a href="#granite_subcat_vert">Вертикальные</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-submenu"><a class="dropdown-toggle" data-toggle="dropdown"  href="#cat_mramor">Мраморные</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#mramor_subcat_hor">Горизонтальные</a></li>
                                        <li><a href="#mramor_subcat_vert">Вертикальные</a></li>
                                    </ul>
                                </li>
                                <li><a href="#cat_polimer">Полимер-гранит</a></li>
                            </ul>
                        </li>
                        <li><a href="#tabels">Оградки, скамейки, столики</a></li>
                        <li><a href="#grave">Гравировка</a></li>
                        <li><a href="#epitafii">Эпитафии</a></li>
                        <li><a href="#works">Наши работы</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>-->
<?= $content; ?>
    <div class="footer">



        <div id="yandex_map" style="width: 300px; height: 200px"></div>


    </div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

