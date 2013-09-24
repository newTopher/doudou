<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-30
 * Time: 上午9:27
 * To change this template use File | Settings | File Templates.
 */
class UserRelationController extends Controller{

    public function actionAttentions(){
        $user=Yii::app()->session['user'];
        if(!($attentionList = Yii::app()->cache->get(self::USERKEY_PREFIX.'attentionlists'.$user['id']))){
            $attentionList=AttentionListModel::getUserAttentionUidList($user['id']);
            Yii::app()->cache->set(self::USERKEY_PREFIX.'attentionlists'.$user['id'],$attentionList,3);
        }
        array_shift($attentionList);
        $users = UserModel::getUsersByIdList($attentionList);
        $this->render('attentions',array(
            'user'=>$user,
            'users'=>$users
        ));
    }

    public function actionFollowers(){
        $user=Yii::app()->session['user'];
        if(!($fansList = Yii::app()->cache->get(self::USERKEY_PREFIX.'fanslists'.$user['id']))){
            $fansList=AttentionListModel::getUserFollowerUidList($user['id']);
            Yii::app()->cache->set(self::USERKEY_PREFIX.'fanslists'.$user['id'],$fansList,3);
        }
        array_shift($fansList);
        $users = UserModel::getUsersByIdList($fansList);
        $this->render('followers',array(
            'user'=>$user,
            'users'=>$users
        ));
    }

}