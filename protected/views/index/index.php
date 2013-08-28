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
                        <li><i class="icon-envelope"></i><span class="infoTips">有眼缘的</span><a href="">135</a></li>
                        <li><i class="icon-envelope"></i><span class="infoTips">爱慕我的</span><a href="">235</a></li>
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
                        <li><a href="javascript:void(0)" id="imgUpload">添加图片</a></li>
                        <li><a href="">@</a></li>
                        <li class="pubToolsBarRightLi">你还可以输入<i class="limitText">128</i>个字</li>
                    </ul>

                </div>
            </div>
        </div>
        <div class="span3">
            <div class="topUserRightBox">
                最新活动还没开始哦！！！
            </div>
        </div>
    </div>
</div>