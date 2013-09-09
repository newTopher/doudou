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
            $uid=Yii::app()->session['user']['id'];
        echo $uid;
        if(isset($uid)){
            //$sid=5;
            $_POST['uid']=5;
            $weiboModel= new WeiboModel();
            if($uid==$_POST['uid']){
                $MatchMessage=$this->loverMatch($uid,null);
                $weiboList=$weiboModel->getUserWeiboList(array($uid));
                $this->validateWeiboList($weiboList);
                $this->render('index',array('MatchMessage'=>$MatchMessage,'weiboList'=>$weiboList));
            }else{
                $weiboList=$weiboModel->getUserWeiboList(array($_POST['uid']));
                $MatchMessage=$this->loverMatch($uid,$_POST['id']);
                $this->validateWeiboList($weiboList);
                $this->render('index',array('MatchMessage'=>$MatchMessage,'weiboList'=>$weiboList));
            }
        }else{
            Yii::app()->runController('Error/error/errorMsg/'.'uid或者sid不能为空');
        }


    }

    private function validateWeiboList($weiboList){
        if(isset($weiboList)){
            return $weiboList;
        }else{
            $error="您还没有发布微博信息哦，赶快去发布吧！";
        }
    }
    public function loverMatch($uid,$Matchid){
        

    }
}

