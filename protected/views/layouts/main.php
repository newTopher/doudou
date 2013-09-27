<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="zh-cn" />
    <?php Yii::app()->bootstrap->register(); ?>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/base.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/common.js"></script>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/base.css" rel="stylesheet">
</head>

<body>
    <div id="bg"></div>
    <div class="navbar navbar-inverse navbar-fixed-top" xmlns="http://www.w3.org/1999/html"
         xmlns="http://www.w3.org/1999/html">
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
                            <a href="<?php echo Yii::app()->createUrl('index/logout'); ?>" class="navbar-link"><?php echo Yii::app()->user->name.'('.Yii::app()->session['user']['name'].')'; ?></a>
                        <?php elseif(Yii::app()->user->isGuest): ?>
                            <a href="<?php echo Yii::app()->createUrl('login/login'); ?>" class="navbar-link">登陆</a>
                        <?php endif; ?>

                    </p>
                    <ul class="nav">
                        <li class="active"><a href="#">个人中心</a></li>
                        <li><a href="#about">找人</a></li>
                        <li><a href="#about">照片</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
	<?php echo $content; ?>


</body>
</html>
