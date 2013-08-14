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
        $this->render('perfect',array(
            'model'=>$signModel
        ));
    }

}