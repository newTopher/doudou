<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-20
 * Time: 下午3:53
 * To change this template use File | Settings | File Templates.
 */
class UserHomeController extends Controller{

    public function actionIndex(){
        $user=UserModel::getUserById(Yii::app()->session['user']['uid']);
        print_r($user);
    }

}