<?php if (isset($about) && count($about)): ?>
<!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">About</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <?php /** @var  $item \common\models\About */ foreach ($about as $index=>$item): ?>
                        <li class="<?= $index%2?"timeline-inverted":""; ?>">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="<?=$item->getImageUrl() ?>" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4><?=$item->time ?></h4>
                                    <h4 class="subheading"><?=$item->event ?></h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted"><?=$item->description ?></p>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Be Part
                                    <br>Of Our
                                    <br>Story!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>