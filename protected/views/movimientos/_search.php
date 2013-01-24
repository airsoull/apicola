<?php
/* @var $this MovimientosController */
/* @var $model Movimientos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_movimientos'); ?>
		<?php echo $form->textField($model,'id_movimientos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_cajones'); ?>
		<?php echo $form->textField($model,'id_cajones'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_movimiento'); ?>
		<?php echo $form->textField($model,'fecha_movimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gps_altitud'); ?>
		<?php echo $form->textField($model,'gps_altitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gps_longitud'); ?>
		<?php echo $form->textField($model,'gps_longitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gps_altura'); ?>
		<?php echo $form->textField($model,'gps_altura'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'origen'); ?>
		<?php echo $form->textField($model,'origen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destino'); ?>
		<?php echo $form->textField($model,'destino'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->