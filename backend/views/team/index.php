<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <p>
        <?= Html::a('Create Team', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
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
            'name',
            'profession',
            [
                'attribute' => 'Image',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img($data->getImageUrl());
                },
            ],
            [
                'attribute' => 'Social links',
                'format' => 'raw',
                'value' => function ($model) {
                    $result = "";
                    if ($model->link_twitter) {
                        $link = 'https://twitter.com/' . $model->link_twitter;
                        $result .= Html::tag('i', '', ['class' => "fa fa-twitter-square", 'aria-hidden' => 'true']) . ' ';
                        $result .= Html::a($link,[$link]). '<br/>';
                    }

                    if ($model->link_facebook) {
                        $link = 'https://facebook.com/' . $model->link_facebook;
                        $result .= Html::tag('i', '', ['class' => "fa fa-facebook-square", 'aria-hidden' => 'true']). ' ';
                        $result .= Html::a($link, [$link]). '<br/>';
                    }

                    if ($model->link_linkedin) {
                        $link = 'https://linkedin.com/' . $model->link_linkedin;
                        $result .= Html::tag('i', '', ['class' => "fa fa-linkedin-square", 'aria-hidden' => 'true']). ' ';
                        $result .= Html::a($link, [$link]). '<br/>';
                    }

                    return $result ? $result : 'none';
                },
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
    <?php Pjax::end(); ?>
</div>

