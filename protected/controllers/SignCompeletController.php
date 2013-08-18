<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-14
 * Time: 下午10:19
 * To change this template use File | Settings | File Templates.
 */
class SignCompeletController extends Controller{

    public function actionPerfect(){
        $signModel=new SignModel();
        if(Yii::app()->request->isAjaxRequest){
            if(false !== UserModel::validUserByUidAndAcode($_POST['uid'],$_POST['sid'])){
                $signModel->id=$_POST['uid'];
                $signModel->name=$_POST['name'];
                $signModel->sex=$_POST['sex'];
                $signModel->school_id=$_POST['school_id'];
                $signModel->grate=$_POST['grate'];
                if($signModel->validate()){
                    if($signModel->compeletUser()){
                        echo CJSON::encode(array('code'=>'0','msg'=>'success'));
                    }else{
                        echo CJSON::encode(array('code'=>'-1','msg'=>'compeletUser error'));
                    }
                }else{
                    echo CJSON::encode(array('code'=>'-1','msg'=>$signModel->errors));
                }
            }else{
                echo CJSON::encode(array('code'=>'-1','msg'=>'非法用户'));
                return false;
            }
        }else{
            $uid=Yii::app()->request->getParam('uid','');
            $sid=Yii::app()->request->getParam('sid','');
            if(empty($uid) || empty($sid)){
                //$this->redirect(Yii::app()->request->baseUrl);
                Yii::app()->runController('Error/error/errorMsg/'.'uid或者sid不能为空');
            }else if(false === UserModel::validUserByUidAndAcode($uid,$sid)){
                Yii::app()->runController('Error/error/errorMsg/'.'非法用户');
            }
            $this->render('perfect',array(
                'model'=>$signModel,
                'uid'=>$uid,
                'sid'=>$sid
            ));
        }
    }

    public function actionUserHeadImage(){
         print_r(Yii::app()->session['user']);
    }

}