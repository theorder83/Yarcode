<!-- Navigation -->
<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

$settings = Yii::$app->settings;
$siteName = $settings->get('Settings.siteName');

?>

<?php


    NavBar::begin([
        'brandLabel' => $siteName,
        'brandUrl' => '#page-top',
        'brandOptions'=>[
            'class'=>'navbar-header page-scroll',
            'data-target'=>"#bs-example-navbar-collapse-1",
        ],
        'options' => [
            'class' => 'navbar navbar-default navbar-custom navbar-fixed-top  ',
            'id' => 'mainNav',
        ],
    ]);

    echo Nav::widget([
        'options' => [
            'class' => 'nav navbar-nav navbar-right',
        ],
        'items' => [
               ['label' => 'Services', 'url' =>'#services','linkOptions'=>['class'=>'page-scroll']],
               ['label' => 'Portfolio', 'url' =>'#portfolio','linkOptions'=>['class'=>'page-scroll']],
               ['label' => 'About', 'url' =>'#about','linkOptions'=>['class'=>'page-scroll']],
               ['label' => 'Team', 'url' =>'#team','linkOptions'=>['class'=>'page-scroll']],
               ['label' => 'Contact', 'url' =>'#contact','linkOptions'=>['class'=>'page-scroll']],
        ],
    ]);
    NavBar::end();

?>


