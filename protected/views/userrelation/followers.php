<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-9-13
 * Time: 下午9:50
 * To change this template use File | Settings | File Templates.
 */
?>

<div class="container">
    <div class="row">
        <div class="span2">
            <div class="userLeftBar">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="<?php echo Yii::app()->createUrl('Index/Index'); ?>">我的主页</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('Photo/Index'); ?>">我的照片</a></li>
                    <li><a href="">玩得好的</a></li>
                    <li><a href="">大家在玩</a></li>
                    <li><a href="">牵线搭桥</a></li>
                </ul>
            </div>
        </div>

        <div class="span8">
            <div class="attentionsUserlist">
                <ul>
                    <?php foreach($users as $val): ?>
                        <li>
                            <span class='imageList'>
                                <a href="<?php echo Yii::app()->request->baseUrl.'/index-test.php/userindex/index?uid='.$val['id']; ?>">
                                  <img src='<?php echo Yii::app()->request->baseUrl.'/uploads/userheadimage/'.$val['head_img']; ?>' />
                                </a>
                            </span>
                            <div class='rightUserInfo'>
                                <span class='usernameinfo'><a href="<?php echo Yii::app()->request->baseUrl.'/index-test.php/userindex/index?uid='.$val['id']; ?>"><?php echo $val['name']; ?></a></span>
                                <span class="schoolinfo"><?php echo $val['school_name']; ?> <?php echo $val['grate']; ?>级</span>
                                <span class="userlikeButton"> <button class="btn btn-mini btn-info" type="button">喜欢</button></span>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <span class="span2">

        </span>
    </div>
</div>