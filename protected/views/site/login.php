<fieldset>
	<legend>&nbsp;Login&nbsp;</legend>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'htmlOptions'=>array('class'=>'simple-form'),
	'enableAjaxValidation'=>True,
	'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ), 
)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?><br>
		<?php echo $form->textField($model,'username', array('class'=>'text')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?><br>
		<?php echo $form->passwordField($model,'password', array('class'=>'text')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<?PHP /*
	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>
	*/ ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Entrar', array('class'=>'submit btn-medium style-color')); ?>
	</div><br>
	¿No tienes cuenta?&nbsp;<?php echo CHtml::link('Registrate', array('usuario/crear'), array('optionName'=>'optionValue')); ?>

<?php $this->endWidget(); ?>
</div><!-- form -->
</fieldset>
