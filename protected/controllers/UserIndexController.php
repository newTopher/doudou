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
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/jquery.sinaEmotion.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/userindex/jquery-1.6.3.min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/userindex/cufon-yui.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/userindex/FF-cash.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/userindex/jquery.featureCarousel.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/userindex/cufon-replace.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.sinaEmotion.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/userindex/w-blog.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/base.js');
        $sid=Yii::app()->session['user']['id'];
        if(isset($sid)){
            $uid = Yii::app()->request->getParam('uid',$sid);
            $weiboModel= new WeiboModel();

            if($sid==$uid){
                $MatchMessage=$this->loverMatch($sid,null);
                $weiboList=$weiboModel->getUserWeiboList(array($sid));
                $this->validateWeiboList($weiboList);
                echo $weiboList[0]['user']['head_img'];
                $this->render('index',array('MatchMessage'=>$MatchMessage,'weiboList'=>$weiboList));

            }else{
                $weiboList=$weiboModel->getUserWeiboList(array($uid));
                $MatchMessage=$this->loverMatch($uid,$uid);
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
           return $error="您还没有发布微博信息哦，赶快去发布吧！";
        }
    }
    public function loverMatch($sid,$Matchid){

    }
    public function actionCommentSubmit(){

        $comment=$_POST["commentData"];


    }
}

