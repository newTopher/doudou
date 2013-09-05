<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-20
 * Time: 下午4:20
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="container">

    <form class="form-signin" method="post" action="<?php echo Yii::app()->createUrl('login/login'); ?>">
        <h4 class="form-signin-heading">登陆兜兜网</h4>
            <input type="email" name="email" class="input-block-level" placeholder="邮箱">
            <input type="password" name="password" class="input-block-level" placeholder="密码">
            <label class="checkbox">
            <input type="checkbox" name="rememberme" value="1"> 一个月内自动登录
        </label>
        <button class="btn btn-media btn-info" type="submit">登陆</button> <a href="<?php echo Yii::app()->createUrl('register/register'); ?>">还不是兜兜网一员</a>
    </form>

</div> <!-- /container -->