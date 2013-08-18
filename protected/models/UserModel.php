<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-13
 * Time: 下午1:41
 * To change this template use File | Settings | File Templates.
 */
class UserModel extends CActiveRecord{
    public $id;

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return '{{user}}';
    }

    public static function validEmail($email){
        return self::model()->find('email=:email',array(':email'=>$email));
    }

    public static function getRegUserEmailById($uid){
        $user = self::model()->findByPk($uid);
        return $user->attributes;
    }

    public static function validUserByUidAndAcode($uid,$acode){
        if(($user = self::model()->findByPk($uid))){
            if($user->attributes['acode']==$acode){
                return true;
            }else{
                return false;
            }
        }else{
            Yii::log(self::model()->errors,CLogger::LEVEL_ERROR);
            return false;
        }
    }

    public function passEncrypt($password){
        return md5($password);
    }




}