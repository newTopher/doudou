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

	<?php echo $content; ?>


</body>
</html>
