<?php
/**
 * @var $this yii\web\View
 */
use backend\assets\BackendAsset;
use backend\models\SystemLog;
use backend\widgets\Menu;
use common\models\TimelineEvent;
use yii\bootstrap\Alert;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\log\Logger;
use yii\widgets\Breadcrumbs;

$bundle = BackendAsset::register($this);
?>
<?php $this->beginContent('@backend/views/layouts/base.php'); ?>
<div class="wrapper">
    <!-- header logo: style can be found in header.less -->
    <header class="main-header">
        <a href="<?php echo Yii::$app->urlManagerFrontend->createAbsoluteUrl('/') ?>" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <?php echo Yii::$app->name ?>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only"><?php echo Yii::t('backend', 'Toggle navigation') ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li id="timeline-notifications" class="notifications-menu">
                        <a href="<?php echo Url::to(['/timeline-event/index']) ?>">
                            <i class="fa fa-bell"></i>
                            <span class="label label-success">
                                    <?php echo TimelineEvent::find()->today()->count() ?>
                                </span>
                        </a>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li id="log-dropdown" class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-warning"></i>
                            <span class="label label-danger">
                                <?php echo SystemLog::find()->count() ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header"><?php echo Yii::t('backend', 'You have {num} log items', ['num' => SystemLog::find()->count()]) ?></li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <?php foreach (SystemLog::find()->orderBy(['log_time' => SORT_DESC])->limit(5)->all() as $logEntry): ?>
                                        <li>
                                            <a href="<?php echo Yii::$app->urlManager->createUrl(['/log/view', 'id' => $logEntry->id]) ?>">
                                                <i class="fa fa-warning <?php echo $logEntry->level === Logger::LEVEL_ERROR ? 'text-red' : 'text-yellow' ?>"></i>
                                                <?php echo $logEntry->category ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li class="footer">
                                <?php echo Html::a(Yii::t('backend', 'View all'), ['/log/index']) ?>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')) ?>"
                                 class="user-image">
                            <span><?php echo Yii::$app->user->identity->username ?> <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header light-blue">
                                <img src="<?php echo Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')) ?>"
                                     class="img-circle" alt="User Image"/>
                                <p>
                                    <?php echo Yii::$app->user->identity->username ?>
                                    <small>
                                        <?php echo Yii::t('backend', 'Member since {0, date, short}', Yii::$app->user->identity->created_at) ?>
                                    </small>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <?php echo Html::a(Yii::t('backend', 'Profile'), ['/sign-in/profile'], ['class' => 'btn btn-default btn-flat']) ?>
                                </div>
                                <div class="pull-left">
                                    <?php echo Html::a(Yii::t('backend', 'Account'), ['/sign-in/account'], ['class' => 'btn btn-default btn-flat']) ?>
                                </div>
                                <div class="pull-right">
                                    <?php echo Html::a(Yii::t('backend', 'Logout'), ['/sign-in/logout'], ['class' => 'btn btn-default btn-flat', 'data-method' => 'post']) ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <?php echo Html::a('<i class="fa fa-cogs"></i>', ['/site/settings']) ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo Yii::$app->user->identity->userProfile->getAvatar($this->assetManager->getAssetUrl($bundle, 'img/anonymous.jpg')) ?>"
                         class="img-circle"/>
                </div>
                <div class="pull-left info">
                    <p><?php echo Yii::t('backend', 'Hello, {username}', ['username' => Yii::$app->user->identity->getPublicIdentity()]) ?></p>
                    <a href="<?php echo Url::to(['/sign-in/profile']) ?>">
                        <i class="fa fa-circle text-success"></i>
                        <?php echo Yii::$app->formatter->asDatetime(time()) ?>
                    </a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php echo Menu::widget([
                'options' => ['class' => 'sidebar-menu'],
                'linkTemplate' => '<a href="{url}">{icon}<span>{label}</span>{right-icon}{badge}</a>',
                'submenuTemplate' => "\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
                'activateParents' => true,
                'items' => [
                    [
                        'label' => Yii::t('backend', 'Main'),
                        'options' => ['class' => 'header']
                    ],
                    [
                        'label' => Yii::t('backend', 'Timeline'),
                        'icon' => '<i class="fa fa-bar-chart-o"></i>',
                        'url' => ['/timeline-event/index'],
                        'badge' => TimelineEvent::find()->today()->count(),
                        'badgeBgClass' => 'label-success',
                    ],
                    [
                        'label' => Yii::t('backend', 'Content'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-edit"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => in_array(\Yii::$app->controller->id,['page','article','article-category','widget-text','widget-menu','widget-carousel']),
                        'items' => [
                            ['label' => Yii::t('backend', 'Static pages'), 'url' => ['/page/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'page')],
                            ['label' => Yii::t('backend', 'Articles'), 'url' => ['/article/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'article')],
                            ['label' => Yii::t('backend', 'Article Categories'), 'url' => ['/article-category/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'article-category')],
                            ['label' => Yii::t('backend', 'Text Widgets'), 'url' => ['/widget-text/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'widget-text')],
                            ['label' => Yii::t('backend', 'Menu Widgets'), 'url' => ['/widget-menu/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'widget-menu')],
                            ['label' => Yii::t('backend', 'Carousel Widgets'), 'url' => ['/widget-carousel/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'widget-carousel')],
                        ]
                    ],
                    [
                        'label' => Yii::t('backend', 'Shop'),
                        'options' => ['class' => 'header']
                    ],
                    [
                        'label' => Yii::t('backend', 'Shop'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-cart-plus"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => in_array(\Yii::$app->controller->id,['products','products-category','manufacturers']),
                        'items' => [
                            ['label' => Yii::t('backend', 'Products'), 'url' => ['/products/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'page')],
                            ['label' => Yii::t('backend', 'Categories'), 'url' => ['/category/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'article')],
                            ['label' => Yii::t('backend', 'Manufacturers'), 'url' => ['/manufacturers/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'article-category')],
//                            ['label' => Yii::t('backend', 'Text Widgets'), 'url' => ['/widget-text/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'widget-text')],
//                            ['label' => Yii::t('backend', 'Menu Widgets'), 'url' => ['/widget-menu/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'widget-menu')],
//                            ['label' => Yii::t('backend', 'Carousel Widgets'), 'url' => ['/widget-carousel/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'widget-carousel')],
                        ]
                    ],
                    [
                        'label' => Yii::t('backend', 'Converter'),
                        'options' => ['class' => 'header']
                    ],
                    [
                        'label' => Yii::t('backend', 'Directory'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-bars"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => in_array(\Yii::$app->controller->id,['lo','cities','data','values','valgold','valsilver','sku']),
                        'items' => [
                            ['label' => Yii::t('backend', 'Los'), 'url' => ['/lo/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'lo')],
                            ['label' => Yii::t('backend', 'Cities'), 'url' => ['/cities/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'cities')],
                            ['label' => Yii::t('backend', 'Datas'), 'url' => ['/data/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'data')],
                            ['label' => Yii::t('backend', 'Values'), 'url' => ['/values/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'values')],
                            ['label' => Yii::t('backend', 'Valgold'), 'url' => ['/valgold/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'valgold')],
                            ['label' => Yii::t('backend', 'Valsilver'), 'url' => ['/valsilver/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'valsilver')],
                            ['label' => Yii::t('backend', 'Stat'), 'url' => ['/stat/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'stat')],
                            ]
                    ],
                    [
                        'label' => Yii::t('backend', 'Config'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-wrench"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => in_array(\Yii::$app->controller->id,['lo','data','values','widget-text','widget-menu','widget-carousel']),
                        'items' => [
                            ['label' => Yii::t('backend', 'Config'), 'url' => ['/config/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'config')],
//                            ['label' => Yii::t('backend', 'City'), 'url' => ['/city/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'data')],
                            ['label' => Yii::t('backend', 'Upload'), 'url' => ['/data/upload'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'upload')],
                            ]
                    ],
                    [
                        'label' => Yii::t('backend', 'System'),
                        'options' => ['class' => 'header']
                    ],
                    [
                        'label' => Yii::t('backend', 'Users'),
                        'icon' => '<i class="fa fa-users"></i>',
                        'url' => ['/user/index'],
                        'active' => (\Yii::$app->controller->id == 'user'),
                        'visible' => Yii::$app->user->can('administrator')
                    ],
                    [
                        'label' => Yii::t('backend', 'Other'),
                        'url' => '#',
                        'icon' => '<i class="fa fa-cogs"></i>',
                        'options' => ['class' => 'treeview'],
                        'active' => in_array(\Yii::$app->controller->id,['i18n-source-message','i18n-message','key-storage','file-storage','cache','file-manager','system-information', 'log']),
                        'items' => [
                            [
                                'label' => Yii::t('backend', 'i18n'),
                                'url' => '#',
                                'icon' => '<i class="fa fa-flag"></i>',
                                'options' => ['class' => 'treeview'],
                                'active' => in_array(\Yii::$app->controller->id,['i18n-source-message','i18n-message']),
                                'items' => [
                                    ['label' => Yii::t('backend', 'i18n Source Message'), 'url' => ['/i18n/i18n-source-message/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'i18n-source-message')],
                                    ['label' => Yii::t('backend', 'i18n Message'), 'url' => ['/i18n/i18n-message/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'i18n-message')],
                                ]
                            ],
                            ['label' => Yii::t('backend', 'Key-Value Storage'), 'url' => ['/key-storage/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'key-storage')],
                            ['label' => Yii::t('backend', 'File Storage'), 'url' => ['/file-storage/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>', 'active' => (\Yii::$app->controller->id == 'file-storage')],
                            ['label' => Yii::t('backend', 'Cache'), 'url' => ['/cache/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
                            ['label' => Yii::t('backend', 'File Manager'), 'url' => ['/file-manager/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
                            [
                                'label' => Yii::t('backend', 'System Information'),
                                'url' => ['/system-information/index'],
                                'icon' => '<i class="fa fa-angle-double-right"></i>'
                            ],
                            [
                                'label' => Yii::t('backend', 'Logs'),
                                'url' => ['/log/index'],
                                'icon' => '<i class="fa fa-angle-double-right"></i>',
                                'badge' => SystemLog::find()->count(),
                                'badgeBgClass' => 'label-danger',
                            ],
                        ]
                    ]
                ]
            ]) ?>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $this->title ?>
                <?php if (isset($this->params['subtitle'])): ?>
                    <small><?php echo $this->params['subtitle'] ?></small>
                <?php endif; ?>
            </h1>

            <?php echo Breadcrumbs::widget([
                'tag' => 'ol',
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php if (Yii::$app->session->hasFlash('alert')): ?>
                <?php echo Alert::widget([
                    'body' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body'),
                    'options' => ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'),
                ]) ?>
            <?php endif; ?>
            <?php echo $content ?>
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<?php $this->endContent(); ?>
