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

    }


}