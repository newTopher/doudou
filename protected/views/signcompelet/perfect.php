<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'SignCompeletForm',
    'type'=>'horizontal',
    'htmlOptions'=>array(
        'data'=>Yii::app()->request->hostInfo
    )
)); ?>

    <fieldset>
        <legend>完善信息</legend>
        <input type='hidden' name='SignModel[school_id]' value="" id="schoolId">
        <?php echo $form->textFieldRow($model, 'name', array(
            'hint'=>'请输入您在兜兜网的昵称，方便别人认识你哦',
            'class'=>'input-medium'
            )
        ); ?>
        <?php echo $form->radioButtonListRow($model, 'sex', array('男','女'),array('class'=>'inline')); ?>
        <?php echo $form->textFieldRow($model, 'schoolName',array('id'=>'schoolSelect','placeholder'=>'点击选择您的学校')); ?>
        <?php echo $form->dropDownListRow($model, 'grate', array(
            '2008'=>'2008级',
            '2009'=>'2009级',
            '2010'=>'2010级',
            '2011'=>'2011级',
            '2012'=>'2012级'),
            array('class'=>'span2')
        ); ?>


    </fieldset>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'确定')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'重置')); ?>
    </div>

<?php $this->endWidget(); ?>

<!-- Modal -->
<div id="schoolBox" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">选择您的学校</h3>
    </div>
    <div class="modal-body">
        <p id="loadFail" class="loadFail"></p>
        <h5>先选择省份</h5>
        <div class="row show-grid listProvince" id="listProvince">

        </div>

        <div class="row show-grid listProvince listSchools" id="listSchools">

        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal">关闭窗口</button>
    </div>
</div>