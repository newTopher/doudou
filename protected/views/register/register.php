<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-12
 * Time: 下午3:45
 * To change this template use File | Settings | File Templates.
 */
?>
<h3>用户注册</h3>

<div class="alert fade in regTip" id="regTip">
    <button type="button" class="close" id="regClose">×</button>
    <span></span>
</div>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
   'id'=>'regForm',
   'htmlOptions'=>array('class'=>'well')
));?>
<?php echo $form->textFieldRow($regModel,'email',array('class'=>'span3 form-horizontal','placeholder'=>'email')); ?>
<?php echo $form->passwordFieldRow($regModel,'password',array('class'=>'span3 .form-horizontal','placeholder'=>'password')); ?><br>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'buttonType'=>'primary',
    'label'=>'register',
    'loadingText'=>'Loading...',
    'htmlOptions'=>array('id'=>'regButton','data'=>Yii::app()->request->hostInfo)
    )); ?>
<?php $this->endWidget(); ?>


<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'regModal')); ?>

    <div class="modal-header" id="tipHeader">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4></h4>
    </div>

    <div class="modal-body" id="tipBody">
        <p></p>
    </div>

<div class="modal-footer">
    <button class="btn btn-primary" id="goEmail" data-loading-text="已发送..."></button>
    <button class="btn" data-dismiss="modal" aria-hidden="true">关闭并登录</button>
</div>

<?php $this->endWidget(); ?>