<?php if (isset($projects) && count($projects)): ?>
    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Portfolio</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <?php /** @var  $project \common\models\Project */
                foreach ($projects as $project): ?>
                    <div class="col-md-4 col-sm-6 portfolio-item">
                        <a href="#portfolioModal<?= $project->id ?>" class="portfolio-link" data-toggle="modal">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content">
                                    <i class="fa fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="<?= $project->getImageUrl('preview') ?>" class="img-responsive" alt="">
                        </a>
                        <div class="portfolio-caption">
                            <h4><?= $project->name ?></h4>
                            <p class="text-muted"><?= $project->description ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <?php /** @var  $project \common\models\Project */
    foreach ($projects as $project): ?>
        <div class="portfolio-modal modal fade" id="portfolioModal<?= $project->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2><?= $project->title ?></h2>
                                <p class="item-intro text-muted"><?= $project->description_title ?></p>
                                <img class="img-responsive img-centered"
                                     src="<?= $project->getImageUrl() ?>" alt="">
                                <?= $project->text ?>
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                                            class="fa fa-times"></i> Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


<?php endif; ?>