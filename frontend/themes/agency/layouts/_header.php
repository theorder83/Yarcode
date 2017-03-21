<!-- Navigation -->
<?php

   use yii\bootstrap\Nav;
   use yii\bootstrap\NavBar;

?>

<?php

    /** @var  $blocks \yii\db\ActiveQuery */
    /** @var  $settings \backend\models\BlockSettings */
    //$settings = $blocks->where(['name'=>'Service'])->one();


    NavBar::begin([
        'brandLabel' => 'Yii 2 Learning',
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


