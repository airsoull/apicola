<?php
/* @var $this RevisionController */
/* @var $model Revision */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_revision'); ?>
		<?php echo $form->textField($model,'id_revision'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_cajones'); ?>
		<?php echo $form->textField($model,'id_cajones'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_revision'); ?>
		<?php echo $form->textField($model,'fecha_revision'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observacion'); ?>
		<?php echo $form->textArea($model,'observacion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_estado'); ?>
		<?php echo $form->textField($model,'id_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_comunas'); ?>
		<?php echo $form->textField($model,'id_comunas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->