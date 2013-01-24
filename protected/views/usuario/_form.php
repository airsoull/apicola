<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>True,
	'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<fieldset>
		<legend>Datos</legend>
	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?><br>
		<?php echo $form->textField($model,'usuario',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?><br>
		<?php echo $form->passwordField($model,'password',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mail'); ?><br>
		<?php echo $form->emailField($model,'mail',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'mail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tipo'); ?><br>
		<?php echo $form->dropDownList($model,'id_tipo', Chtml::listData(Tipo::model()->findAll(), 'id_tipo', 'nombre')); ?>
		<?php echo $form->error($model,'id_tipo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class'=>'button')); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->