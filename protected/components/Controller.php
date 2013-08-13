<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
    const REG_TIP_HEADER='注册激活提示';
    const REG_TIP_BODY='恭喜您注册成功，我们给您邮箱里面发送了一封邮件,请您激活...';
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function getEmailUrl(){
        return 'http://mail.qq.com';
    }

    public function sendemail($email,$contents){
        $mailInstance = Yii::app()->createComponent('application.extensions.mailer.Emailer');

    }
}