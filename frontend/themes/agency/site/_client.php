    <!-- Clients Aside -->

    <?php  if (isset($clients) && count($clients)): ?>
    <aside class="clients">
        <div class="container">
            <div class="row">
                <?php /** @var  $client \common\models\Clients */ foreach ($clients as $client): ?>
                    <div class="col-md-3 col-sm-6">
                        <a href="<?= $client->link ?>" target="_blank">
                            <img src="<?= $client->getImageUrl() ?>" class="img-responsive img-centered img-gray" alt="">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </aside>
    <?php endif; ?>