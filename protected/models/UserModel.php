<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-13
 * Time: 下午1:41
 * To change this template use File | Settings | File Templates.
 */
class UserModel extends CActiveRecord{

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return '{{user}}';
    }

    public static function validEmail($email){
        return self::model()->find('email=:email',array(':email'=>$email));
    }





}