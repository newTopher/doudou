<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-9-23
 * Time: 下午11:29
 * To change this template use File | Settings | File Templates.
 */
class PhotoController extends Controller{

    public function actionIndex(){
        $user = Yii::app()->session['user'];

        $this->render('photoindex',array(
            'user'=>$user
        ));
    }

    public function actionPhotos(){
        $user = Yii::app()->session['user'];
        $this->render('photos',array(
            'user'=>$user
        ));
    }

}