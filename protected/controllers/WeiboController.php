<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-30
 * Time: 下午1:41
 * To change this template use File | Settings | File Templates.
 */
class WeiboController extends Controller{

    public function actionPub(){
        $text=Yii::app()->request->getParam('text','');
        $pics=Yii::app()->request->getParam('pics','');
        $uid=Yii::app()->request->getParam('uid','');
        if(empty($text)){
            echo CJSON::encode(array('code'=>'-1','msg'=>'微博内容不能为空'));
            return false;
        }elseif(empty($uid)){
            echo CJSON::encode(array('code'=>'-1','msg'=>'用户ID不能为空'));
            return false;
        }else{
            $weiboModel = new WeiboModel();
            $weiboModel->text=$text;
            $weiboModel->uid=$uid;
            if($pics != ''){
                $weiboModel->pics = explode('/',$pics)[1];
            }else{
                $weiboModel->pics='';
            }
            if($weiboModel->addNewWeibo()){
                echo CJSON::encode(array('code'=>'0','msg'=>'success'));
            }else{
                echo CJSON::encode(array('code'=>'-1','msg'=>'微博发布失败'));
                return false;
            }
        }
    }

    public function actionLike(){
        $uid=Yii::app()->request->getParam('uid','');
        $wid=Yii::app()->request->getParam('wid','');
        if(!empty($uid) && !empty($wid)){
            $likeModel=new LikeModel();
            $likeModel->uid=$uid;
            $likeModel->wid=$wid;
            if(($like=$likeModel->getIsLiked())){
                if($likeModel->cancelLike($like)){
                    echo CJSON::encode(array('code'=>'1','msg'=>'success'));
                }else{
                    echo CJSON::encode(array('code'=>'-1','msg'=>'取消喜欢失败了'));
                    return false;
                }
            }else{
                if($likeModel->insertLike()){
                    echo CJSON::encode(array('code'=>'0','msg'=>'success'));
                }else{
                    echo CJSON::encode(array('code'=>'-1','msg'=>'喜欢这个失败了'));
                    return false;
                }
            }
        }else{
            echo CJSON::encode(array('code'=>'-1','msg'=>'错误操作'));
            return false;
        }
    }

    public function actionComment(){

    }

}