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
            echo <<<eof
<div class="userinfoboxcontent">
    <div class="name_card">
        <dl class="name clearfix">
            <dt><a href="http://www.jsfoot.com/"><img class="picborder_r" alt="猫头鹰" src="images/0.jpg" /></a></dt>
            <dd>
                <p>
                    <a href="http://www.jsfoot.com/">朱韬奋</a>
                </p>
                <p class="address">北京大学 </p>
                <div>
                    <ul class="userdata clearfix">
                        <li><a href="http://www.jsfoot.com/">关注</a> 1095</li>
                        <li class="W_vline">|</li>
                        <li><a href="http://www.jsfoot.com/">粉丝</a> 963万</li>
                    </ul>
                </div>
            </dd>
        </dl>
        <dl class="info clearfix">
            <dt>个性签名：</dt>
            <dd>微博搞笑中心！每天搜罗最搞笑最好玩的微博。关注我，获得每日新鲜笑料...</dd>
        </dl>
        <div class="links clearfix">
            <p>
                <span class="W_chat_stat W_chat_stat_online"></span>
                <a href="javascript:;">聊天</a>
                <span class="W_vline">|</span>
                <span><a href="javascript:void(0);">求关注</a></span>
                <span class="W_vline">|</span>
                <span><a href="javascript:;">设置分组</a></span>
            </p>
            <div class="W_btn_c">
                已关注
                <em class="W_vline">|</em>
                <a class="W_linkb" href="javascript:;"><em>取消</em></a>
            </div>
        </div>
    </div>
</div>

eof;

        }else{
            return;
        }
    }

}