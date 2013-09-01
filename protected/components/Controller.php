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
    const REG_SECEND_TIP_BODY='我们又给您邮箱里面发送了一封邮件,请您激活...';
    const REG_FROM_EMAIL='772232953@qq.com';
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

    public function sendemail($fromEmail,$toEmail,$title,$contents){
        $mailInstance = Yii::createComponent('application.extensions.mailer.Emailer');
        $mailInstance->IsSMTP();
        $mailInstance->SetLanguage('zh_cn');
        $mailInstance->SMTPAuth=true;
        $mailInstance->Host =  'smtp.qq.com';
        $mailInstance->Port = 25;
        $mailInstance->Username=self::REG_FROM_EMAIL;
        $mailInstance->Password='c391288';
        $mailInstance->SetFrom($fromEmail, Yii::app()->name);
        $mailInstance->AddAddress($toEmail);
        $mailInstance->WordWrap=50;
        $mailInstance->IsHTML(true);
        $mailInstance->Subject = $title;
        $body = $mailInstance->AltBody = $contents;
        $mailInstance->MsgHTML($body);
        $mailInstance->Body=$contents;
        if($mailInstance->Send()){
            return true;
        }else{
            //$mailInstance->ErrorInfo;
            return false;
        }
    }

    public function generateNewImageName(){
        return md5(substr(time(),5));
    }
}