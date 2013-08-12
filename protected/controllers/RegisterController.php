<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-12
 * Time: ÏÂÎç2:48
 * To change this template use File | Settings | File Templates.
 */
class RegisterController extends Controller{

    public function actionRegister(){
        $regModel=new RegModel();
        $this->render('register',array(
            'regModel'=>$regModel
        ));
    }





}