<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-14
 * Time: 下午9:43
 * To change this template use File | Settings | File Templates.
 */

class LoginController extends Controller{

    public function actionLogin(){
        $email=Yii::app()->request->getParam('email','');
        $password=Yii::app()->request->getParam('password','');
        $rememberme=Yii::app()->request->getParam('rememberme');
        if(!empty($email) && !empty($password)){
            $loginModel=new LoginForm();
            $loginModel->email=$email;
            $loginModel->password=$password;
            $loginModel->rememberMe=$rememberme;
            if($loginModel->validate() && $loginModel->login()){
                $this->redirect(Yii::app()->user->returnUrl);
            }else{
                echo "用户名或者密码登陆失败";
                $this->render('login');
            }
        }else{
            $this->render('login');
        }
    }


}