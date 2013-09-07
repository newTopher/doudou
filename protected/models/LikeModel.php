<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-9-5
 * Time: 下午2:52
 * To change this template use File | Settings | File Templates.
 */
class LikeModel extends CActiveRecord{

    public $id;
    public $uid;
    public $wid;

    public static function model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return '{{like}}';
    }

    public function getIsLiked(){
        if(null !== ($like = self::model()->findByAttributes(array('wid'=>$this->wid,'uid'=>$this->uid)))){
            return $like;
        }else{
            return false;
        }
    }

    public function insertLike(){
        if($this->save()){
            if(WeiboModel::addLikeCounts($this->wid)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function cancelLike($like){
        if(self::model()->deleteByPk($like->id)){
            if(WeiboModel::subLikeCounts($this->wid)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}