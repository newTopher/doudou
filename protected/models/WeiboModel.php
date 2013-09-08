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
            'user'=>array(self::BELONGS_TO,'UserModel','uid','select'=>'user.user_sign,user.name,user.id,user.head_img'),
            'weibocomment'=>array(self::HAS_MANY,'WeiboCommentModel','w_id')
        );
    }

    public function addNewWeibo(){
        $this->create_time=time();
        if(false !== $this->save()){
            return $this->w_id;
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
            foreach($list as $k=>$l){
                $larray=array();
                $larray['weibo']=$l->attributes;
                $larray['comment']=$this->getWeiboCommment($l->attributes['w_id']);
                $larray['weibo']['create_time']=self::formatPubTime($larray['weibo']['create_time']);
                $larray['user']=$l->getRelated('user')->attributes;
                $weiboList[]=$larray;
            }
            //print_r($weiboList);exit;
            return $weiboList;
        }else{
            return null;
        }
    }

    public function getWeiboCommment($wid){
        $weiboCommentModel = new WeiboCommentModel();
        $weiboCommentModel->w_id=$wid;
        return $weiboCommentModel->getComment();
    }

    static public function addLikeCounts($wid){
        $weibo = self::model()->findByPk($wid);
        $weibo->like+=1;
        if($weibo->save()){
            return true;
        }else{
            return false;
        }
    }

    static public function subLikeCounts($wid){
        $weibo = self::model()->findByPk($wid);
        $weibo->like-=1;
        if($weibo->save()){
            return true;
        }else{
            return false;
        }
    }

    static public function addCommentCounts($wid){
        $weibo = self::model()->findByPk($wid);
        $weibo->comments_counts+=1;
        if($weibo->save()){
            return true;
        }else{
            return false;
        }
    }

    static public function formatPubTime($time){
        $subTime = time() - $time;
        switch($subTime){
            case $subTime > 0 && $subTime <60:
                return $subTime.'秒之前';
                break;
            case $subTime >=60 && $subTime <3600:
                return ceil($subTime/60).'分钟之前';
                break;
            case $subTime >= 3600 && $subTime < 3600*24:
                return ceil($subTime/3600).'小时之前';
                break;
            default:
                return date("Y-m-d H:i",$time);
        }
    }


}