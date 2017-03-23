<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Team */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
                        $result .= Html::a($link, [$link]) . '<br/>';
                    }

                    if ($model->link_facebook) {
                        $link = 'https://facebook.com/' . $model->link_facebook;
                        $result .= Html::tag('i', '', ['class' => "fa fa-facebook-square", 'aria-hidden' => 'true']) . ' ';
                        $result .= Html::a($link, [$link]) . '<br/>';
                    }

                    if ($model->link_linkedin) {
                        $link = 'https://linkedin.com/' . $model->link_linkedin;
                        $result .= Html::tag('i', '', ['class' => "fa fa-linkedin-square", 'aria-hidden' => 'true']) . ' ';
                        $result .= Html::a($link, [$link]) . '<br/>';
                    }

                    return $result ? $result : 'none';
                },
            ]
        ],
    ]) ?>

</div>
