<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-9-26
 * Time: 下午11:40
 * To change this template use File | Settings | File Templates.
 */
class HomeController extends Controller{

    public $layout='//layouts/column4';

    public function actionIndex(){
        $this->render('index');
    }

}