<footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright"><?=Yii::$app->settings->get('Settings.siteCopyright') ?></span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="//twitter.com/<?=Yii::$app->settings->get('Settings.siteTwitter') ?>"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="//facebook.com/<?=Yii::$app->settings->get('Settings.siteFacebook') ?>"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="//linkedin.com/<?=Yii::$app->settings->get('Settings.siteLinkedin') ?>"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <?= $this->render('static.php') ?>
                </div>
            </div>
        </div>
    </footer>