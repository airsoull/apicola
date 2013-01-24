<?php
/* @var $this CajonesController */
/* @var $model Cajones */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_cajones'); ?>
		<?php echo $form->textField($model,'id_cajones'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigo_barra'); ?>
		<?php echo $form->textField($model,'codigo_barra',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidad_marcos'); ?>
		<?php echo $form->textField($model,'cantidad_marcos'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->