<?php
/**
* Created by JetBrains PhpStorm.
 * User: Administrator
    * Date: 13-9-1
    * Time: 下午4:28
    * To change this template use File | Settings | File Templates.
 */
class UserIndexController extends Controller{

    public $layout='//layouts/column3';

    public  function actionIndex(){
            Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/userindex/grid.css');
            Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/userindex/reset.css');
            Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/userindex/style.css');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/userindex/jquery-1.6.3.min.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/userindex/cufon-yui.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/userindex/FF-cash.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/userindex/jquery.featureCarousel.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/userindex/w-blog.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/userindex/cufon-replace.js');
            $uid=Yii::app()->session['$uid'];

            $imgsrc=new UserModel();
            $imgsrc->getUserById($uid);


        $this->render('index',array());
    }

}