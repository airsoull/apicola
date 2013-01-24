<?php
/* @var $this ProductoController */
/* @var $model Producto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'producto-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableAjaxValidation'=>True,
	'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
)); ?>
	<?php echo $form->errorSummary($model); ?>
	<fieldset>
		<legend>Datos básicos</legend>
	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?><br>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row" id="tipo">
		<?php echo $form->labelEx($model,'id_tipo'); ?><br>
		<?php echo $form->dropDownList($model,'id_tipo', Chtml::listData(proTipo::model()->findAll(), 'id_tipo', 'nombre'), array('empty'=>'Elija Tipo Del Producto')); ?>
		<?php echo $form->error($model,'id_tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?><br>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_general'); ?><br>
		<?php echo $form->textArea($model,'descripcion_general',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion_general'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imagen'); ?><br>
		<?PHP if(!$model->isNewRecord){ ?>
                <span><div style="width:50px;"><a href="<?PHP echo Yii::app()->request->baseUrl.'/imagenes/'.$model->imagen; ?>" rel="lightbox"><img src="<?PHP echo Yii::app()->request->baseUrl.'/imagenes/'.$model->imagen; ?>" width="100%"></a></div></span>
                <?PHP } ?>
		<?php echo $form->fileField($model, 'image', array('id'=>'upload')); ?>
		<?php echo $form->error($model,'imagen'); ?>
	</div>
	</fieldset>
	<fieldset>
		<legend>Datos De Compra</legend>
	<div class="row">
		<?php echo $form->labelEx($model,'stock'); ?><br>
		<?php echo $form->textField($model,'stock'); ?>
		<?php echo $form->error($model,'stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_um'); ?><br>
		<?php echo $form->dropDownList($model,'id_um', Chtml::listData(Um::model()->findAll(), 'id_um', 'nombre'),array('class'=>'medium required valid', 'empty'=>'Elija Unidad De Monto')); ?>
		<?php echo $form->error($model,'id_um'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio'); ?><br>
		$<?php echo $form->textField($model,'precio'); ?>
		<?php echo $form->error($model,'precio'); ?>
	</div>
	</fieldset>
	<fieldset>
		<legend>Producto Activo</legend>
	<div class="row">
		<?php echo $form->labelEx($model,'id_activo'); ?><br>
		<?php echo $form->dropDownList($model,'id_activo', Chtml::listData(Activo::model()->findAll(), 'id_activo', 'nombre'),array('class'=>'medium required valid')); ?>
		<?php echo $form->error($model,'id_activo'); ?>
	</div>
	</fieldset>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'button')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
