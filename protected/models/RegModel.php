<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-12
 * Time: 下午4:17
 * To change this template use File | Settings | File Templates.
 */
class RegModel extends CFormModel{
    public $email;
    public $password;

    public function rules(){
        return array(
            array('email,password','required','message'=>'亲,邮箱格式不正确哦!'),
        );
    }

    public function validateEmail(){
        return UserModel::validEmail($this->email);
    }

    public function addUser(){
        $userModel = new UserModel();
        $userModel->email=$this->email;
        $userModel->password=$userModel->passEncrypt($this->password);
        $userModel->is_active=0;
        $userModel->acode=$this->createAcodeRand();
        if(false !== $userModel->save()){
            return array('uid'=>$userModel->id,'acode'=>$userModel->acode);
        }else{
            return false;
        }
    }

    public function createAcodeRand(){
        return md5(substr(time(),2,6));
    }

    public static function createActiveLink($acode,$uid){
        return  "恭喜您成为兜兜网大家庭的一员<a href='".Yii::app()->request->hostInfo."/index-test.php/register/active/uid/".$uid."/acode/".$acode."'>点及此处开始您的兜兜生活</a>";
    }
}