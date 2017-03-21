<?php
use yii\web\View;

?>
<?php $this->beginContent('@frontend/themes/agency/layouts/_base.php'); ?>

<?= $this->render('_header.php') ?>

<?= $content ?>

<?= $this->render('_footer.php') ?>

<?php $this->endContent(); ?>


