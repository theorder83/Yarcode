<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Service;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Service', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php Pjax::begin(['timeout' => false]); ?>    <?=

    GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            [
                'attribute' => 'position',
                'format' => 'raw',
                'value' => function ($model) {
                    /* @var $model Service */
                    $up_icon = Html::tag('i', '', ['class' => "fa fa-arrow-up", 'aria-hidden' => 'true']);
                    $down_icon = Html::tag('i', '', ['class' => "fa fa-arrow-down", 'aria-hidden' => 'true']);
                    $up = $model->isTopPosition() ? $up_icon : Html::a(Html::tag('i', $up_icon), ['move', 'id' => $model->id, 'type' => \backend\components\Controller::TYPE_MOVE_UP]);
                    $down = $model->isBottomPosition() ? $down_icon : Html::a(Html::tag('i', $down_icon), ['move', 'id' => $model->id, 'type' => \backend\components\Controller::TYPE_MOVE_DOWN]);
                    return $up . ' ' . $down;
                }
            ],
            //'id',
            'name',
            'description:ntext',
            [
                'attribute' => 'icon',
                'enableSorting' => false,
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::tag('i', '', [
                        'class' => "fa {$model->icon}",
                        'aria-hidden' => 'true',
                    ]);
                }
            ],
            [
                'attribute' => 'visible',
                'format' => 'raw',
                'value' => function ($model) {
                    return Html::a(Html::tag('i', '', [
                        'class' => $model->visible ? "fa fa-toggle-on" : "fa fa-toggle-off",
                        'aria-hidden' => 'true',
                    ]), ['toggle-visible', 'id' => $model->id]);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>
    <?php Pjax::end(); ?></div>

