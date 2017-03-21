
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->profile->fullName ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?php if(false):?>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <?php endif; ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Main menu', 'options' => ['class' => 'header']],
                    ['label' => 'Home', 'icon' => 'fa fa-file-code-o', 'url' => ['site/index']],
                    ['label' => 'Site management', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Content',
                        'icon' => 'fa fa-folder-open',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Service', 'icon' => 'fa fa-paw', 'url' => ['/service/index'],],
                            ['label' => 'Project', 'icon' => 'fa fa-briefcase', 'url' => ['/project/index'],],
                            ['label' => 'About', 'icon' => 'fa fa-clock-o', 'url' => ['/about/index'],],
                            ['label' => 'Team', 'icon' => 'fa fa-users', 'url' => ['/team/index'],],
                            ['label' => 'Clients', 'icon' => 'fa fa-smile-o', 'url' => ['/client/index'],],
                        ],
                    ],
                    ['label' => 'Settings', 'icon' => 'fa fa-cogs', 'url' => ['block-settings/index']],
                    ['label' => 'Static pages', 'icon' => 'fa fa-file-o', 'url' => ['/debug']],
                    ['label' => 'User settings', 'options' => ['class' => 'header']],
                    ['label' => 'Change password', 'icon' => 'fa fa-lock', 'url' => ['/profile/change-password']],
                ],
            ]
        ) ?>

    </section>

</aside>
