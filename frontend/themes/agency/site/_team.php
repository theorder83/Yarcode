<?php if (isset($team) && count($team)): ?>
<!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <?php /** @var  $client \common\models\Team */ foreach ($team as $person): ?>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="<?= $person->getImageUrl() ?>" class="img-responsive img-circle" alt="">
                        <h4><?= $person->name ?></h4>
                        <p class="text-muted"><?= $person->profession ?></p>
                        <?php if ($person->link_facebook || $person->link_twitter || $person->link_linkedin ): ?>
                        <ul class="list-inline social-buttons">
                            <?php if ($person->link_twitter ): ?>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <?php endif; ?>
                            <?php if ($person->link_linkedin ): ?>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <?php endif; ?>
                            <?php if ($person->link_facebook ): ?>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <?php endif; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>