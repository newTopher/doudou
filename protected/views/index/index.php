<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="navbar navbar-inverse navbar-fixed-top" xmlns="http://www.w3.org/1999/html"
     xmlns="http://www.w3.org/1999/html">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="#">兜兜网</a>
            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    <?php if(!Yii::app()->user->isGuest): ?>
                        <a href="<?php echo Yii::app()->createUrl('index/logout'); ?>" class="navbar-link"><?php echo Yii::app()->user->name.'('.$user['name'].')'; ?></a>
                    <?php elseif(Yii::app()->user->isGuest): ?>
                        <a href="<?php echo Yii::app()->createUrl('login/login'); ?>" class="navbar-link">登陆</a>
                    <?php endif; ?>

                </p>
                <ul class="nav">
                    <li class="active"><a href="#">个人中心</a></li>
                    <li><a href="#about">找人</a></li>
                    <li><a href="#about">照片</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">
    <!--start top-->
    <div class="row-fluid topContainer">
        <div class="span2">
            <span class="headerBox">
                <?php if($user['head_img']==''): ?>
                    <?php if($user['sex']==0):?>
                        <div>
                          <span class="uploadHeader"></span>
                          <img class="img-rounded userHeaderImage" src="<?php echo Yii::app()->request->baseUrl.'/images/base/defaultheaderman.jpg' ;?>">
                      </div>
                    <?php elseif($user['sex']==1): ?>
                      <div>
                          <img class="img-rounded userHeaderImage" src="<?php echo Yii::app()->request->baseUrl.'/images/base/defaultheaderwomen.jpg' ;?>">
                          <span class="uploadHeader"><i class="icon-pencil icon-white"></i><a href="" class="uploadAlink">没头像不好看</a></span>
                      </div>
                    <?php endif; ?>
                <?php else: ?>
                    <img class="img-rounded userHeaderImage" src="<?php echo Yii::app()->request->baseUrl.'/uploads/userheadimage/'.$user['head_img'] ;?>">
                <?php endif; ?>
            </span>
        </div>
        <div class="span7">
            <div class="userBaseInfoBox">
                <div class="userBaseInfoBox-Top">
                    <ul class="inline">
                        <li><i class="icon-envelope"></i><span class="infoTips">有眼缘的</span><a href=""><?php if($attentions==null){echo '0';}else{echo $attentions;}; ?></a></li>
                        <li><i class="icon-envelope"></i><span class="infoTips">爱慕我的</span><a href=""><?php if($fans==null){echo '0';}else{echo $fans;}; ?></a></li>
                        <li><i class="icon-envelope"></i><span class="infoTips">收到的求爱</span><a href="">235</a></li>
                        <li><i class="icon-envelope"></i><span class="infoTips">收到的鲜花</span><a href="">235</a></li>
                    </ul>
                </div>
                <div class="recommendInfoBox">
                    你可能喜欢的，赞一个！！！！！
                </div>
                <div class="userPubMsgBox">
                    <div class="input-append appendInputBox">
                        <textarea class="pubTextAreaBox" uname="<?php echo $user['name']; ?>" uid="<?php echo $user['id'] ;?>" id="appendedInputButton"></textarea>
                        <button class="btn btn-info btn-large pubButton" type="button" id="pubButton">发表状态</button>
                    </div>
                </div>
                <div class="pubToolsBar">
                    <ul class="inline">
                        <li><a href="javascript:void(0)" id="emotionAlink">表情</a></li>
                        <li>
                            <a data-toggle="popover" href="javascript:void(0)" id="imgUpload">添加图片</a>
                        </li>
                        <li><a href="javascript:void(0)" id="shareUrlBtn">分享</a></li>
                        <li class="pubToolsBarRightLi">你还可以输入<i class="limitText">128</i>个字</li>
                    </ul>
                    <div class="popover fade bottom in uploadImageBox" id="uploadImageBox">
                        <div class="arrow"></div>
                        <h3 class="popover-title">请选择你要上传的图片<button type="button" class="close" id="uploadImageClose">×</button></h3>
                        <div class="popover-content">
                            <form> <input type="file" id="fileButton" class="fileButton" value="请选择图片"></form>
                        </div>
                        <div class="uploadedImageBox" id="uploadedImageBox">
                            <div class="alert alert-block alert-error fade in fileUploadError">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <h5 class="alert-heading">You got an error!</h5>
                            </div>
                        </div>
                    </div>

                    <div class="popover fade bottom in shareUrl" id="shareUrl">
                        <div class="arrow"></div>
                        <h3 class="popover-title">请输入你要分享的音乐或者视频链接<button type="button" class="close" id="shareUrlClose">×</button></h3>
                        <div class="popover-content">
                            <div class="input-append shareUrlBox">
                                <input type="text" class="input-medium" id="hasShareUrl">
                                <button type="button" class="btn" id="shareUrlButton">分享</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3">
            <div class="topUserRightBox">
                最新活动还没开始哦！！！
            </div>
        </div>
    </div>
    <!--end top-->
    <div class="addWrap" id="commentHideBox">
        <textarea class="userComTextarea" placeholder="在此输入评论内容"></textarea>
        <div class="userComToolsBar">
            <ul class="inline">
            <li class="userComButtonLi"><button class="btn userComButton" type="button">回复</button></li>
            <li><a href="javascript:void(0)" class="commentEmotion">表情</a></li>
            </ul>
        </div>
    </div>

    <div class="popover fade bottom in userinfoBox">
        <div class="arrow"></div>
        <div class="popover-content">

        </div>
    </div>
    <!--start center-->
    <div class="row">
        <div class="span2">
            <div class="userLeftBar">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="">我的照片</a></li>
                    <li><a href="">玩得好的</a></li>
                    <li><a href="">大家在玩</a></li>
                    <li><a href="">牵线搭桥</a></li>
                </ul>
            </div>
        </div>
        <div class="span7">
            <div class="userPubCenter">
                <div class="stautsButton">
                    <ul class="inline">
                        <li><a href="javascript:void(0)">好友在说</a></li>
                        <li><a href="javascript:void(0)">和我相关的</a></li>
                    </ul>
                </div>
            </div>

            <div class="weiboListBox">
                <?php if($weiboList !== null): ?>
                    <?php foreach($weiboList as $key => $val): ?>
                        <div class="conWrap clear">
                            <div class="userHeaderPic">
                                <a class='userShortInfo' href="<?php echo Yii::app()->request->baseUrl.'/index-test.php/userindex/index?uid='.$val['user']['id']; ?>">
                                <img class="img-rounded" src="<?php echo Yii::app()->request->baseUrl.'/uploads/userheadimage/'.$val['user']['head_img']; ?>" alt="头像">
                                </a>
                            </div>
                            <div class="conText">
                                <div class="tAreaBox">
                                    <div class="userLitleInfo">
                                        <span class="mb_name"><a class='userShortInfo' href="<?php echo Yii::app()->request->baseUrl."/index-test.php/userindex/index?uid=".$val['user']['id']; ?>"><?php echo $val['user']['name'] ;?></a></span>
                                        <span class="sign">  <?php echo $val['user']['user_sign'] ;?></span>
                                    </div>
                                    <div class="ps">
                                        <div id="q_ps_3180" class="content">
                                            <p class="weiboContentText">
                                                <?php echo $val['weibo']['text'] ;?>
                                            </p>
                                        </div>
                                        <?php if($val['weibo']['pics'] != ''): ?>
                                            <div class='weiimagesBox'>
                                                <img src='<?php echo Yii::app()->request->baseUrl.'/uploads/'.$val['user']['id'].'/'.$val['weibo']['pics']; ?>'>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="otherUserToolBar">
                                        <span class="fromTime"><?php echo $val['weibo']['create_time'] ;?></span>
                                        <a href="javascript:;" uid='<?php echo $user['id'];?>' wid='<?php echo $val['weibo']['w_id'];?>' class="likeButton">喜欢(<span><?php echo $val['weibo']['like'] ;?></span>)</a>
                                        <a href="javascript:;" suid='<?php echo $user['id'];?>' wid='<?php echo $val['weibo']['w_id'];?>' uid='<?php echo $val['user']['id']; ?>' comboxid='commentBox_<?php echo $val['weibo']['w_id'];?>' nikename="<?php echo $val['user']['name'] ;?>" class='commentButton'>
                                            评论(<span id="comment_counts_<?php echo $val['weibo']['w_id'];?>" commentcounts="comment_counts_<?php echo $val['weibo']['w_id'];?>"><?php echo $val['weibo']['comments_counts'] ;?></span>)</a>
                                        <a href="javascript:;">转发(<?php echo $val['weibo']['reposts_counts'] ;?>)</a>
                                    </div>
                                </div>
                                <div class="commentBox">
                                    <ul class="unstyled" id="commentBox_<?php echo $val['weibo']['w_id'];?>">
                                    <?php foreach($val['comment'] as $comval): ?>
                                        <li>
                                            <div class='comUserHeaderPic'>
                                                <a class='userShortInfo' href="<?php echo Yii::app()->request->baseUrl.'/index-test.php/userindex/index?uid='.$comval['suser']['id']; ?>">
                                                <img src="<?php echo Yii::app()->request->baseUrl.'/uploads/userheadimage/'.$comval['suser']['head_img']; ?>" alt='头像'>
                                                </a>
                                            </div>
                                            <div class='comUserNick'>
                                                <a class='userShortInfo' href="<?php echo Yii::app()->request->baseUrl.'/index-test.php/userindex/index?uid='.$comval['suser']['id']; ?>"><?php echo $comval['suser']['name']; ?></a>
                                            </div>
                                            <div class='userComContents'>
                                                <span class="msign">:<a class='userShortInfo' href="<?php echo Yii::app()->request->baseUrl.'/index-test.php/userindex/index?uid='.$comval['user']['id']; ?>">
                                                        <?php if($comval['comment']['parentid']): ?>
                                                            <?php echo '@'.$comval['user']['name']; ?>
                                                        <?php endif; ?>
                                                    </a></span>
                                                <span class='weiboCommentText'>
                                                    <?php echo $comval['comment']['comment_content']; ?>
                                                </span>
                                            </div>
                                            <div class='userComTime'>
                                                <span class='fromTime'><?php echo $comval['comment']['create_time']; ?></span>
                                                <a href='javascript:;' class="replayButton" nickname="<?php echo $comval['suser']['name']; ?>" uid="<?php echo $comval['suser']['id'] ;?>" suid="<?php echo $user['id'] ;?>" wid="<?php echo $val['weibo']['w_id']; ?>" parentid="<?php echo $comval['comment']['id']; ?>" comboxid="commentBox_<?php echo $val['weibo']['w_id'];?>">
                                                <?php if($comval['suser']['id'] != $user['id']):?>
                                                    回复
                                                <?php endif; ?>
                                                </a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="span3">span3</div>
    </div>
    <!--end center-->
</div>
