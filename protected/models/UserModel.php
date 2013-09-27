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

    public function relations(){
        return array(

        );
    }

    public static function getUsersByIdList($idarray){
        $criteria = new CDbCriteria();
        $criteria->select='id,email,sex,birthday,school_id,user_sign,details,head_img,username,name,grate,followers_counts,follow_me,attention_counts,tags,school_name';
        $criteria->addInCondition('id',$idarray);
        $users=array();
        if(null !== ($list=self::model()->findAll($criteria))){
            foreach($list as $val){
                $users[]=$val->attributes;
            }
            return $users;
        }else{
            return null;
        }
    }

    public static function validEmail($email){
        return self::model()->find('email=:email',array(':email'=>$email));
    }

    public static function getRegUserEmailById($uid){
        $user = self::model()->findByPk($uid);
        return $user->attributes;
    }

    public static function getUserById($uid){
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

    public function validatePassword($password){
        if($this->password===$password){
            return true;
        }else{
            return false;
        }

    }

}