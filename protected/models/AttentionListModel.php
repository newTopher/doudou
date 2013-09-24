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

    static public function getUserAttentionUidList($uid){
        if(null !== ($attentionList=self::model()->findAll('follower_uid=:follower_uid',array(':follower_uid'=>$uid)))){
            $ids=array($uid);
            foreach($attentionList as $list){
                $ids[]=$list->attributes['marster_uid'];
            }
            return $ids;
        }else{
            return array($uid);
        }
    }

    static public function getUserFollowerUidList($uid){
        if(null !== ($attentionList=self::model()->findAll('marster_uid=:marster_uid',array(':marster_uid'=>$uid)))){
            $ids=array($uid);
            foreach($attentionList as $list){
                $ids[]=$list->attributes['follower_uid'];
            }
            return $ids;
        }else{
            return array($uid);
        }
    }

    public function getAttentionUserList(){

    }
}