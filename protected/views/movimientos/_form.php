<?php
/* @var $this MovimientosController */
/* @var $model Movimientos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'movimientos-form',
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
		<?php echo $form->labelEx($model,'gps_altitud'); ?><br>
		<?php echo $form->textField($model,'gps_altitud'); ?>
		<?php echo $form->error($model,'gps_altitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gps_longitud'); ?><br>
		<?php echo $form->textField($model,'gps_longitud'); ?>
		<?php echo $form->error($model,'gps_longitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gps_altura'); ?><br>
		<?php echo $form->textField($model,'gps_altura'); ?>
		<?php echo $form->error($model,'gps_altura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'origen'); ?><br>
		<?php echo $form->dropDownList($model,'origen', Chtml::listData(Comunas::model()->findAll(), 'id_comunas', 'nombre'), array('empty'=>'Elija Comuna')); ?>
		<?php echo $form->error($model,'origen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destino'); ?><br>
		<?php echo $form->dropDownList($model,'destino', Chtml::listData(Comunas::model()->findAll(), 'id_comunas', 'nombre'), array('empty'=>'Elija Comuna')); ?>
		<?php echo $form->error($model,'destino'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->