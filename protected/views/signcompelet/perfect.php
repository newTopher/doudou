<?php
/**
 * Created by IntelliJ IDEA.
 * User: Topher
 * Date: 13-8-14
 * Time: 下午10:22
 * To change this template use File | Settings | File Templates.
 */
?>
<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'SignCompeletForm',
    'type'=>'horizontal',
)); ?>

    <fieldset>
        <legend>完善信息</legend>

        <?php echo $form->textFieldRow($model, 'name', array(
            'hint'=>'请输入您在兜兜网的昵称，方便别人认识你哦',
            'class'=>'input-medium')
        ); ?>
        <?php echo $form->radioButtonListRow($model, 'sex', array('男','女'),array('class'=>'inline')); ?>
        <?php echo $form->textFieldRow($model, 'school_id'); ?>
        <?php echo $form->dropDownListRow($model, 'grate', array('2008级', '2009级', '2010级', '2011级', '2012级'),array('class'=>'span2')); ?>


    </fieldset>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'确定')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'重置')); ?>
    </div>

<?php $this->endWidget(); ?>