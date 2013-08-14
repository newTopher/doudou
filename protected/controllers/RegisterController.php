<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-12
 * Time: 2:48
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
                    if(($regUser=$regModel->addUser())){
                        Yii::app()->session['user']=$regUser;
                        if($this->sendemail(self::REG_FROM_EMAIL,$regModel->email,self::REG_TIP_HEADER,RegModel::createActiveLink($regUser['uid'],$regUser['acode']))){
                            echo CJSON::encode(array(
                                'code'=>"0",
                                'uid'=>$regUser['uid'],
                                'tipheader'=>self::REG_TIP_HEADER,
                                'tipbody'=>self::REG_TIP_BODY,
                                'emailurl'=>$this->getEmailUrl()
                            ));
                        }else{
                            echo CJSON::encode(array(
                                array('code'=>"-1",'msg'=>'邮件发送失败！')
                            ));
                        }

                    }else{
                        echo CJSON::encode(array('code'=>"-1",'msg'=>'注册失败！'));
                    }
                }
            }else{
                echo CJSON::encode(array('code'=>"-1",'msg'=>$regModel->errors()));
            }
        }else{
            $this->render('register',array(
                'regModel'=>$regModel
            ));
        }
    }

    public function actionSendEmailAgain(){
        if(Yii::app()->request->isAjaxRequest){
            $uid=Yii::app()->request->getParam('uid','');
            if(!empty($uid)){
                $user = UserModel::getRegUserEmailById($uid);
                if($user!=null){
                    if($this->sendemail(self::REG_FROM_EMAIL,$user['email'],self::REG_TIP_HEADER,RegModel::createActiveLink($uid,$user['acode']))){
                        echo CJSON::encode(array(
                            'code'=>"0",
                            'tipbody'=>self::REG_SECEND_TIP_BODY,
                        ));
                    }else{
                        echo CJSON::encode(array(
                            array('code'=>"-1",'msg'=>'邮件发送失败！')
                        ));
                    }
                }else{
                    echo CJSON::encode(array('code'=>"-1",'msg'=>'用户ID不存在'));
                }
            }
        }
    }

    public function actionActive(){

    }





}