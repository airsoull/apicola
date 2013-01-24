<?php
/* @var $this CajonesController */
/* @var $model Cajones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cajones-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>True,
	'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo_barra'); ?><br>
		<?php echo $form->textField($model,'codigo_barra',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'codigo_barra'); ?>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?><br>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'cantidad_marcos'); ?><br>
		<?php echo $form->textField($model,'cantidad_marcos'); ?>
		<?php echo $form->error($model,'cantidad_marcos'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->