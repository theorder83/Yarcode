<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_title')->textarea(['rows' => 6]) ?>


    <label class="control-label" for="project-text">Text</label>
    <?php echo froala\froalaeditor\FroalaEditorWidget::widget([
        'model' => $model,
        'attribute' => 'text',
        'options'=>[// html attributes
            'id'=>'content',

        ],
        'clientOptions'=>[
            'toolbarInline'=> false,
            'height' => 400,
            'theme' =>'gray',//optional: dark, red, gray, royal
            'language'=>'en_gb' // optional: ar, bs, cs, da, de, en_ca, en_gb, en_us ...
        ]
    ]);; ?>

    <?= $form->field($model, 'file_preview')->fileInput() ?>

    <?= $form->field($model, 'file_image')->fileInput() ?>





    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
