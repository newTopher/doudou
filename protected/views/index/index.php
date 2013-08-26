<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="#">兜兜网</a>
            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    <?php if(!Yii::app()->user->isGuest): ?>
                        <a href="<?php echo Yii::app()->createUrl('index/logout'); ?>" class="navbar-link"><?php echo Yii::app()->user->name; ?></a>
                    <?php elseif(Yii::app()->user->isGuest): ?>
                        <a href="<?php echo Yii::app()->createUrl('login/login'); ?>" class="navbar-link">登陆</a>
                    <?php endif; ?>

                </p>
                <ul class="nav">
                    <li class="active"><a href="#">个人中心</a></li>
                    <li><a href="#about">找人</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="span4"> span4</div>
        <div class="span8"> span8</div>
    </div>
</div>
