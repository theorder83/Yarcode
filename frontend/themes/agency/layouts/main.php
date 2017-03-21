<?php $this->beginContent('@frontend/themes/agency/layouts/_base.php'); ?>
<?= $this->render('_header.php') ?>

 <section class="pages" >
        <div class="container">
           <?= $content ?>
        </div>
</section>


<?= $this->render('_footer.php') ?>

<?php $this->endContent(); ?>

