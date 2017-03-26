<?php
/**
 * Created by PhpStorm.
 * User: Antonov
 */
$this->title = Yii::t('app', 'Manage Application Settings');



?>

<h1><?= $value ?></h1>
<?php $form =\yii\bootstrap\ActiveForm::begin(['id' => 'site-settings-form']); ?>
<h3>Main settings</h3>
<?= $form->field($model, 'siteName') ?>
<?= $form->field($model, 'siteDescription') ?>
<?= $form->field($model, 'siteTitle') ?>
<?= $form->field($model, 'siteCopyright') ?>
<h3>Meta-tag settings</h3>
<?= $form->field($model, 'metaDescription')->textarea() ?>
<?= $form->field($model, 'metaKeywords')->textarea() ?>
<h3>Social links</h3>
<?= $form->field($model, 'siteFacebook') ?>
<?= $form->field($model, 'siteLinkedin') ?>
<?= $form->field($model, 'siteTwitter') ?>


<div class="form-group">
    <?= \yii\helpers\Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php \yii\bootstrap\ActiveForm::end(); ?>
