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
        if(false !== $userModel->save()){
            return $userModel->id;
        }else{
            return false;
        }
    }
}