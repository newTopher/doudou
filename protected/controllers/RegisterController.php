<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-12
 * Time: ����2:48
 * To change this template use File | Settings | File Templates.
 */
class RegisterController extends Controller{

    public function actionRegister(){
        $regModel=new RegModel();
        if(Yii::app()->request->isAjaxRequest){
            $regModel->email=Yii::app()->request->getParam('email','');
            $regModel->password=Yii::app()->request->getParam('password','');
            if($regModel->validate()){
                if($regModel->validateEmail()){
                    echo CJSON::encode(array('code'=>"-1",'msg'=>'用户名已存在!'));
                }else{
                    $regModel->
                }
            }else{

            }
        }else{
            $this->render('register',array(
                'regModel'=>$regModel
            ));
        }
    }





}