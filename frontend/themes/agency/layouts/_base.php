<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

\frontend\assets\AppAsset::register($this);

$settings = Yii::$app->settings;
$settings->clearCache();

$metaDescription = $settings->get('Settings.metaDescription');
$metaKeywords = $settings->get('Settings.metaKeywords');
$this->title = $settings->get('Settings.siteTitle');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $metaDescription ?>" />
    <meta name="keywords" content="<?= $metaKeywords ?>" />

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="page-top" class="index">
<?php $this->beginBody() ?>

<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
