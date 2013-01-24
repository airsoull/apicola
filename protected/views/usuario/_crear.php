<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>True,
	'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
)); ?>

	<?php #echo $form->errorSummary($model); ?>
	<fieldset>
		<legend>&nbsp;Datos&nbsp;</legend>
	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?><br>
		<?php echo $form->textField($model,'usuario',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?><br>
		<?php echo $form->passwordField($model,'password',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'passValidar'); ?><br>
		<?php echo $form->passwordField($model,'passValidar',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'passValidar'); ?>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'mail'); ?><br>
		<?php echo $form->emailField($model,'mail',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'mail'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'submit btn-medium style-color')); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>

</div>