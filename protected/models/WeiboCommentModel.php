<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-9-7
 * Time: 下午10:03
 * To change this template use File | Settings | File Templates.
 */
class WeiboCommentModel extends CActiveRecord{

    public $id;
    public $uid;
    public $w_id;
    public $comment_content;
    public $parentid;


    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return '{{weibocomment}}';
    }

    public function relations(){
        return array(
            'user'=>array(self::BELONGS_TO,'UserModel','uid','select'=>'user.user_sign,user.name,user.id,user.head_img')
        );
    }

    public function addComment(){
        $this->create_time=time();
        if($this->save()){
            return $this->id;
        }else{
            return false;
        }
    }

    public function getComment(){
        $critria = new CDbCriteria();
        $critria->addCondition('w_id=:w_id');
        $critria->params[':w_id']=$this->w_id;
        $critria->order='create_time DESC';
        if(null !== ($commentList = self::model()->with('user')->findAll($critria))){
            $comlist=array();
            foreach($commentList as $val){
                $cl=array();
                $cl['comment']=$val->attributes;
                $cl['comment']['create_time'] = WeiboModel::formatPubTime($cl['comment']['create_time']);
                $cl['user']=$val->getRelated('user')->attributes;
                $comlist[]=$cl;
            }
            return $comlist;
        }else{
            return false;
        }
    }



}