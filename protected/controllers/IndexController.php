<?php

class IndexController extends Controller
{
	/**
	 * Declares class-based actions.
	 */

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js/jquery.qtip.min.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/jquery.sinaEmotion.css');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/js/uploadify/uploadify.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/uploadify/insertAtCaret.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/uploadify/jquery.uploadify.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.SinaEmotion.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.qtip.min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/homebase.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/dialog.js');
        $user=Yii::app()->session['user'];
        if(!($fans = Yii::app()->cache->get(self::USERKEY_PREFIX.'fans'.$user['id']))){
            $fans=AttentionListModel::getFansByUid($user['id']);
            Yii::app()->cache->set(self::USERKEY_PREFIX.'fans'.$user['id'],$fans,3);
        }
        if(!($attentions = Yii::app()->cache->get(self::USERKEY_PREFIX.'attentions'.$user['id']))){
            $attentions=AttentionListModel::getAttentionByUid($user['id']);
            Yii::app()->cache->set(self::USERKEY_PREFIX.'attentions'.$user['id'],$attentions,3);
        }
        if(!($attentionList = Yii::app()->cache->get(self::USERKEY_PREFIX.'fanslists'.$user['id']))){
            $attentionList=AttentionListModel::getUserAttentionUidList($user['id']);
            Yii::app()->cache->set(self::USERKEY_PREFIX.'fanslists'.$user['id'],$attentionList,3);
        }
        $weiboModel=new WeiboModel();
        $weiboList = $weiboModel->getUserWeiboList($attentionList);
		$this->render('index',array(
            'user'=>$user,
            'fans'=>$fans,
            'attentions'=>$attentions,
            'weiboList'=>$weiboList
        ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}