<?php
/* @var $this RevisionController */
/* @var $model Revision */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'revision-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>True,
	'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_cajones'); ?><br>
		<?php echo $form->dropDownList($model,'id_cajones', Chtml::listData(Cajones::model()->findAll(), 'id_cajones', 'codigo_barra'), array('empty'=>'Elija Cajón')); ?>
		<?php echo $form->error($model,'id_cajones'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'observacion'); ?><br>
		<?php echo $form->textArea($model,'observacion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_estado'); ?><br>
		<?php echo $form->dropDownList($model,'id_estado', Chtml::listData(Estado::model()->findAll(), 'id_estado', 'nombre'), array('empty'=>'Elija Estado')); ?>
		<?php echo $form->error($model,'id_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_comunas'); ?><br>
		<?php echo $form->dropDownList($model,'id_comunas', Chtml::listData(Comunas::model()->findAll(), 'id_comunas', 'nombre'), array('empty'=>'Elija Comuna')); ?>
		<?php echo $form->error($model,'id_comunas'); ?>
	</div>

	<div class="row">
		<?PHP $enfermedad = Enfermedades::model(); ?>
		<?php echo $form->labelEx($enfermedad,'nombre'); ?><br>
		<?PHP echo $form->checkBoxList($enfermedad,'id_enfermedades', CHtml::listData($enfermedad->findAll(), 'id_enfermedades', 'nombre')); ?>
		<?php echo $form->error($enfermedad,'nombre'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->