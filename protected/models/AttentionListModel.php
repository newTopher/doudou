<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-30
 * Time: 上午9:39
 * To change this template use File | Settings | File Templates.
 */
class AttentionListModel extends CActiveRecord{

    public $marster_uid;
    public $follower_uid;

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return '{{attentionlist}}';
    }

    public static function getFansByUid($uid){
        if(($users=self::model()->count('marster_uid=:marster_uid',array(':marster_uid'=>$uid)))){
            return $users;
        }else{
            return false;
        }

    }

    public static function getAttentionByUid($uid){
        if(($users=self::model()->count('follower_uid=:follower_uid',array(':follower_uid'=>$uid)))){
            return $users;
        }else{
            return false;
        }

    }
}