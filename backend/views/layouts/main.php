<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" href="favicon.ico" type="image/ico">
</head>
<body>
<?php $this->beginBody() ?>

<section id="container">
  <header class="header black-bg">
          <div class="sidebar-toggle-box">
              <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
          </div>
          <!--logo start-->
          <a href="<?php echo Yii::$app->homeUrl ?>" class="logo"><b>YES NATURAL</b></a>
          <!--logo end-->

          <div class="top-menu">
            <ul class="nav pull-right top-menu">
              <li>
                <?= Html::a('Logout', ['site/logout'],
                ['data' => ['method' => 'post'], 'class'=>'logout']) ?>
              </li>

            </ul>
          </div>
  </header>

      <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">


                <p class="centered"><img src="<?php echo Yii::getAlias('@web').'/sample.jpg' ?>" class="img-circle" width="80"></p>
                <h5 class="centered"><?php echo Yii::$app->user->identity->username; ?></h5>

                <li class="mt">
                    <a href="<?php echo Yii::$app->homeUrl ?>">
                        <i class="fa fa-dashboard"></i><span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-upload" aria-hidden="true"></i><span>Imports</span>
                    </a>
                    <ul class="sub">
                          <li><?php echo Html::a('<i class="fa fa-angle-right" aria-hidden="true"></i> Customer',['customer-upload/index']) ?></li>
                    <!---<li><a  href="#">Extra Link1</a></li>
                        <li><a  href="#">Extra Link2</a></li>
                        <li><a  href="#">Extra Link3</a></li>--->
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-book"></i> <span>Details</span>
                    </a>
                    <ul class="sub">
                      <li> <?php echo Html::a('<i class="fa fa-angle-right" aria-hidden="true"></i> Customer',['customer-upload-details/index']) ?></li>
                    </ul>
                </li>


                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-cog" aria-hidden="true"></i> <span>Settings</span>
                      </a>
                    <ul class="sub">
                        <li> <?php echo Html::a('<i class="fa fa-angle-right" aria-hidden="true"></i> Gii',['gii/default']) ?></li>
                    </ul>
                </li>
                <!---<li class="mt"> Extra Main Menu
                    <a href="<?php echo Yii::$app->homeUrl ?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>--->


                <!---<li class="sub-menu"> Extra Sub Menu
                    <a href="javascript:;" >
                        <i class="fa fa-cogs"></i>
                        <span>Details</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="calendar.html">Calendar</a></li>
                        <li><a  href="gallery.html">Gallery</a></li>
                        <li><a  href="todo_list.html">Todo List</a></li>
                    </ul>
                </li>--->
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>

    <section id="main-content">
      <section class="wrapper">

        <br>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?= Alert::widget() ?>

        <?= $content ?>
      </section>
    </section>


</section>

<footer class="site-footer">
         <div class="text-center">
             2014 - Alvarez.is
             <!---
             <a href="index.html#" class="go-top">
                 <i class="fa fa-angle-up"></i>
             </a>--->
         </div>
     </footer>




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
