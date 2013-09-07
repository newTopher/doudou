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

    public function addComment(){
        $this->create_time=time();
        if($this->save()){
            return $this->id;
        }else{
            return false;
        }
    }



}