<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="zh-cn" />
    <?php Yii::app()->bootstrap->register(); ?>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/home.css" rel="stylesheet">
</head>
    <?php echo $content; ?>
