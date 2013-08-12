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
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
   'id'=>'regForm',
   'action'=>Yii::app()->createUrl('register/reg'),
   'htmlOptions'=>array('class'=>'well')
));?>
<?php echo $form->textFieldRow($regModel,'email',array('class'=>'span3 form-horizontal','placeholder'=>'email')); ?>
<?php echo $form->passwordFieldRow($regModel,'password',array('class'=>'span3 .form-horizontal','placeholder'=>'password')); ?><br>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'buttonType'=>'button',
    'label'=>'register',
    'loadingText'=>'Loading...',
    'htmlOptions'=>array('id'=>'regButton')
    )); ?>
<?php $this->endWidget(); ?>


<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'regModal')); ?>

    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h4>Modal header</h4>
    </div>

    <div class="modal-body">
        <p>One fine body...</p>
    </div>

    <div class="modal-footer">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'type'=>'primary',
            'label'=>'Save changes',
            'url'=>'#',
            'htmlOptions'=>array('data-dismiss'=>'modal'),
        )); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'label'=>'Close',
            'url'=>'#',
            'htmlOptions'=>array('data-dismiss'=>'modal'),
        )); ?>
    </div>

<?php $this->endWidget(); ?>