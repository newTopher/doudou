<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-9-4
 * Time: 上午9:56
 * To change this template use File | Settings | File Templates.
 */
class WeiboModel extends CActiveRecord{

    public $uid;
    public $text;
    public $pics;
    public $create_time;
    public $reposts_counts=0;
    public $comments_counts=0;
    public $like=0;

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return '{{weibo}}';
    }

    public function relations(){
        return array(
            'user'=>array(self::BELONGS_TO,'UserModel','uid')
        );
    }

    public function addNewWeibo(){
        $this->create_time=time();
        if(false !== $this->save()){
            return true;
        }else{
            return false;
        }
    }

    public function getUserWeiboList($attentionList){
        $critria = new CDbCriteria();
        $critria->addInCondition('uid',$attentionList);
        $critria->order='create_time DESC';
        if(null !== ($list=self::model()->with('user')->findAll($critria))){
            $weiboList=array();
            foreach($list as $l){
                $larray=array();
                $larray['weibo']=$l->attributes;
                $larray['user']=$l->getRelated('user')->attributes;
                $weiboList[]=$larray;
            }
            return $weiboList;
        }else{
            return null;
        }
    }


}