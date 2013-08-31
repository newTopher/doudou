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
                        <a href="<?php echo Yii::app()->createUrl('index/logout'); ?>" class="navbar-link"><?php echo Yii::app()->user->name; ?></a>
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
                          <img class="img-rounded" src="<?php echo Yii::app()->request->baseUrl.'/images/base/defaultheaderman.jpg' ;?>">
                      </div>
                    <?php elseif($user['sex']==1): ?>
                      <div>
                          <img class="img-rounded" src="<?php echo Yii::app()->request->baseUrl.'/images/base/defaultheaderwomen.jpg' ;?>">
                          <span class="uploadHeader"><i class="icon-pencil icon-white"></i><a href="" class="uploadAlink">没头像不好看</a></span>
                      </div>
                    <?php endif; ?>
                <?php else: ?>
                    <img class="img-rounded" src="<?php echo Yii::app()->request->baseUrl.'/uploads/userheadimage/'.$user['head_img'] ;?>">
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
                        <textarea class="pubTextAreaBox" id="appendedInputButton"></textarea>
                        <button class="btn btn-info btn-large pubButton" type="button">发表状态</button>
                    </div>
                </div>
                <div class="pubToolsBar">
                    <ul class="inline">
                        <li><a href="javascript:void(0)" id="emotionAlink">表情</a></li>
                        <li>
                            <a data-toggle="popover" href="javascript:void(0)" id="imgUpload">添加图片</a>
                        </li>
                        <li><a href="">@</a></li>
                        <li class="pubToolsBarRightLi">你还可以输入<i class="limitText">128</i>个字</li>
                    </ul>
                    <div class="popover fade bottom in uploadImageBox" id="uploadImageBox">
                        <div class="arrow"></div>
                        <h3 class="popover-title">请选择你要上传的图片<button type="button" class="close" id="uploadImageClose">×</button></h3>
                        <div class="popover-content">
                            <form> <button type="button" class="btn btn-success uploadFileBtn">上传照片<input type="file" id="fileButton" class="fileButton" value="请选择图片"></button></form>
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
                <div class="conWrap clear">
                    <div class="userHeaderPic">
                        <img class="img-rounded" src="http://img.zealer.com/50/50/cc9cc00288b50c4f7bb5c6513433be63dc0.jpg" alt="头像">
                    </div>
                    <div class="conText">
                        <div class="tAreaBox">
                            <div class="userLitleInfo">
                                <span class="mb_name"><a href="">DeliChan</a></span>
                                <span class="sign">  Keep each other warm</span>
                            </div>
                            <div class="ps">
                                <div class="content">
                                    <p>
                                        想问下哈，9月10号不是发布iphone5s嘛，我想入手iphone5，我知道5s一出，iphone5价格肯定会跳水，5s出了之后，多久入手iphone5合适呢，你觉得5的价格大概会降到什么价位呢？ 在哪儿买比较好？可以解答下吗？现在的iphone5还会掉漆吗，黑色版的，
                                    </p>
                                </div>
                            </div>
                            <div class="otherUserToolBar">
                                <span class="fromTime">49分钟前</span>
                                <a href="javascript:;">赞(12)</a>
                                <a href="javascript:;">评论(15)</a>
                                <a href="javascript:;">转发(25)</a>
                            </div>
                        </div>
                        <div class="commentBox">
                            <ul class="unstyled">
                                <li>
                                    <div class="comUserHeaderPic">
                                        <img src="http://img.zealer.com/50/50/cc9cc00288b50c4f7bb5c6513433be63dc0.jpg" alt="头像">
                                    </div>
                                    <div class="comUserNick">
                                        <a href="">陈晓冰</a>
                                    </div>
                                    <div class="userComContents">
                                        <span>
                                            我喜欢你这样子的回答我喜欢你这样子的回答我喜欢你这样子的回答我喜欢你这样子的回答
                                        </span>
                                    </div>
                                    <div class="userComTime">
                                        <span class="fromTime">3分钟前</span><a href="javascript:;">回复</a>
                                    </div>

                                </li>
                            </ul>
                            <div class="addWrap">
                                <textarea class="userComTextarea" placeholder="在此输入评论内容"></textarea>
                                <div class="userComToolsBar">
                                    <ul class="inline">
                                        <li class="userComButtonLi"><button class="btn userComButton" type="button">回复</button></li>
                                        <li><a href="javascript:void(0)">表情</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="conWrap clear">
                    <div class="userHeaderPic">
                        <img class="img-rounded" src="http://img.zealer.com/50/50/cc9cc00288b50c4f7bb5c6513433be63dc0.jpg" alt="头像">
                    </div>
                    <div class="conText">
                        <div class="tAreaBox">
                            <div class="userLitleInfo">
                                <span class="mb_name"><a href="">DeliChan</a></span>
                                <span class="sign">  Keep each other warm</span>
                            </div>
                            <div class="ps">
                                <div id="q_ps_3180" class="content">
                                    <p>
                                        今天去哪里玩呢，你觉得怎么样啊
                                    </p>
                                </div>
                            </div>
                            <div class="otherUserToolBar">
                                <span class="fromTime">49分钟前</span>
                                <a href="javascript:;">赞(12)</a>
                                <a href="javascript:;">评论(15)</a>
                                <a href="javascript:;">转发(25)</a>
                            </div>
                        </div>
                        <div class="commentBox">
                            <ul class="unstyled">
                                <li>
                                    <div class="comUserHeaderPic">
                                        <img src="http://img.zealer.com/50/50/cc9cc00288b50c4f7bb5c6513433be63dc0.jpg" alt="头像">
                                    </div>
                                    <div class="comUserNick">
                                        <a href="">陈晓冰</a>
                                    </div>
                                    <div class="userComContents">
                                        <span>
                                            估计你是神了！！！
                                        </span>
                                    </div>
                                    <div class="userComTime">
                                        <span class="fromTime">3分钟前</span><a href="javascript:;">回复</a>
                                    </div>

                                </li>
                            </ul>
                            <div class="addWrap">
                                <textarea class="userComTextarea" placeholder="在此输入评论内容"></textarea>
                                <div class="userComToolsBar">
                                    <ul class="inline">
                                        <li class="userComButtonLi"><button class="btn userComButton" type="button">回复</button></li>
                                        <li><a href="javascript:void(0)">表情</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="span3">span3</div>
    </div>
    <!--end center-->
</div>
