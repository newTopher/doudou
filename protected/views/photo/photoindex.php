<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-9-23
 * Time: 下午11:33
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="container">
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

            <div class="userLeftBar">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="<?php echo Yii::app()->createUrl('Index/Index'); ?>">我的主页</a></li>
                    <li class="active"><a href="<?php echo Yii::app()->createUrl('Photo/Index'); ?>">我的照片</a></li>
                    <li><a href="">玩得好的</a></li>
                    <li><a href="">大家在玩</a></li>
                    <li><a href="">牵线搭桥</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="span8">
                <div class='phoneindex'>
                    <div class="photobar">
                        <button class="btn btn-info">上传照片</button>
                        <button class="btn btn-info">新建相册</button>
                    </div>

                    <div class="photolistbox">

                    </div>
                </div>
            </div>

            <span class="span2">

            </span>
        </div>
    </div>

</div>