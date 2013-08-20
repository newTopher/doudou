<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-18
 * Time: 上午11:13
 * To change this template use File | Settings | File Templates.
 */
?>
    <div class="row">
        <span class="span6"><h4>求真相,上传您的头像可以马上为您匹配有眼缘的<?php if($sex == 1): ?>美女<?php elseif($sex == 0): ?>帅哥<?php endif; ?>哦</h4></span>
        <span class="span2"><button class="btn">先去首页看看吧</button></span>
    </div>

    <div class="container">
    <div class="row-fluid">
        <div class="span3">
            <img class="userImageBox" id="userImageBox" src="<?php
                if($sex == 1){
                    echo Yii::app()->request->baseUrl.'/images/base/defaultheaderman.jpg';
                }else if($sex == 0){
                    echo Yii::app()->request->baseUrl.'/images/base/defaultheaderwomen.jpg';
                }
            ?>" class="img-rounded">
        </div>
        <div class="span9">
            <div class="row">
                <form id="userHeaderForm" action="<?php echo Yii::app()->createUrl('SignCompelet/processUserHeader') ?>" method="post">
                <div class="span9">

                    <input type="hidden" name="uid" id="headerUid" value="<?php echo $uid; ?>">
                    <input type="hidden" name="sid" id="headerSid" value="<?php echo $sid; ?>">
                    <input type="hidden" id="headerSex" value="<?php echo $sex; ?>">
                    <input type="hidden" name="usertags" id="userTags" class="userTags" value="">
                    <input type="hidden" name="imagesurl" id="imagesurl" value="">
                    <span class="tagsTip">选择适合您的标签,可以多选哦!</span>

                </div>
                </form>
                <?php
                $this->widget('application.extensions.xupload.XUpload', array(
                    'url' => Yii::app()->createUrl("SignCompelet/upload"),
                    'model' => $model,
                    'attribute' => 'file',
                    'options'=>array(
                        'complete'=>'js:function(result, textStatus, jqXHR, options){
                            if(textStatus==\'success\'){
                               var res= eval(result.responseText);
                               $("#userImageBox").attr(\'src\',res[\'0\'].url);
                               $("#imagesurl").val(res[\'0\'].url);
                            }
                        }'
                    )
                ));
                ?>
            </div>






        </div>



    </div>

</div>