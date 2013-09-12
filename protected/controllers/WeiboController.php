<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-30
 * Time: 下午1:41
 * To change this template use File | Settings | File Templates.
 */
class WeiboController extends Controller{

    public function actionPub(){
        $text=Yii::app()->request->getParam('text','');
        $pics=Yii::app()->request->getParam('pics','');
        $uid=Yii::app()->request->getParam('uid','');
        if(empty($text)){
            echo CJSON::encode(array('code'=>'-1','msg'=>'微博内容不能为空'));
            return false;
        }elseif(empty($uid)){
            echo CJSON::encode(array('code'=>'-1','msg'=>'用户ID不能为空'));
            return false;
        }else{
            $weiboModel = new WeiboModel();
            $weiboModel->text=$text;
            $weiboModel->uid=$uid;
            if($pics != ''){
                $picArr=explode('/',$pics)[1];
                $weiboModel->pics = $picArr[1];
            }else{
                $weiboModel->pics='';
            }
            if(false !== ($wid=$weiboModel->addNewWeibo())){
                echo CJSON::encode(array('code'=>'0','data'=>$wid,'msg'=>'success'));
            }else{
                echo CJSON::encode(array('code'=>'-1','msg'=>'微博发布失败'));
                return false;
            }
        }
    }

    public function actionLike(){
        $uid=Yii::app()->request->getParam('uid','');
        $wid=Yii::app()->request->getParam('wid','');
        if(!empty($uid) && !empty($wid)){
            $likeModel=new LikeModel();
            $likeModel->uid=$uid;
            $likeModel->wid=$wid;
            if(($like=$likeModel->getIsLiked())){
                if($likeModel->cancelLike($like)){
                    echo CJSON::encode(array('code'=>'1','msg'=>'success'));
                }else{
                    echo CJSON::encode(array('code'=>'-1','msg'=>'取消喜欢失败了'));
                    return false;
                }
            }else{
                if($likeModel->insertLike()){
                    echo CJSON::encode(array('code'=>'0','msg'=>'success'));
                }else{
                    echo CJSON::encode(array('code'=>'-1','msg'=>'喜欢这个失败了'));
                    return false;
                }
            }
        }else{
            echo CJSON::encode(array('code'=>'-1','msg'=>'错误操作'));
            return false;
        }
    }

    public function actionComment(){
        $wid=Yii::app()->request->getParam('wid','');
        $uid=Yii::app()->request->getParam('uid','');
        $suid=Yii::app()->request->getParam('suid','');
        $parentid=Yii::app()->request->getParam('parentid','');
        $commentContent=Yii::app()->request->getParam('comment_content','');
        if(!empty($wid) && !empty($uid) && !empty($suid) && !empty($commentContent)){
            $weiboCommentModel = new WeiboCommentModel();
            $weiboCommentModel->w_id=$wid;
            $weiboCommentModel->uid=$uid;
            $weiboCommentModel->suid=$suid;
            $weiboCommentModel->comment_content=$commentContent;
            $weiboCommentModel->parentid=$parentid;
            if(false !== ($id = $weiboCommentModel->addComment())){
                if(WeiboModel::addCommentCounts($weiboCommentModel->w_id)){
                    echo CJSON::encode(array('code'=>'0','data'=>$id,'msg'=>'success'));
                }else{
                    echo CJSON::encode(array('code'=>'-1','msg'=>'评论次数增加失败'));
                }
            }else{
                echo CJSON::encode(array('code'=>'-1','msg'=>'评论失败'));
                return;
            }
        }else{
            echo CJSON::encode(array('code'=>'-1','msg'=>'some is empty'));
            return;
        }
    }

    public function actionAjaxgetUser(){
        $uid=Yii::app()->request->getParam('uid','');
        if(($user = UserModel::getUserById($uid))){
            $ta='她';
            if($user['sex']==1){
                $ta = '他';
            }
            echo "
<div class='userinfoboxcontent'>
    <div class='usertopinfobox'>
        <span class='uheaderbox'><img src='".Yii::app()->request->hostInfo.'/uploads/userheadimage/'.$user['head_img']."'></span>
        <p class='usershortinfo'>
          <a href='".Yii::app()->request->hostInfo.'/userindex/index?uid='.$user['id']."'>看看".$ta."</a>  湖南大学".$user['grate']."级
          爱慕<a href=''>12</a> | 喜欢<a href=''>45</a>   <a href=''>关注</a>   <a href=''>送花</a>
        </p>
    </div>
</div>
";
        }else{
            return;
        }
    }

}