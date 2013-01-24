<?php
/* @var $this ProTipoController */
/* @var $model proTipo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pro-tipo-form',
	'enableAjaxValidation'=>True,
	'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        )
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<fieldset>
		<legend>Datos</legend>
	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?><br>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?><br>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'button')); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->