<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-17
 * Time: 下午10:10
 * To change this template use File | Settings | File Templates.
 */
class ErrorController extends Controller{
    public function actionError(){
            echo Yii::t('error',Yii::app()->request->getParam('errorMsg'));
            exit;
    }

}