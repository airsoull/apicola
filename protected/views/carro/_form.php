<style type="text/css">
	#Persona_dv{
		width:10px;
	}
</style>
<fieldset>
	<legend>&nbsp;Datos Particulares&nbsp;</legend>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'persona-form',
	'enableAjaxValidation'=>True,
	'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
)); ?>

	<div class="row">
		<?PHP if($model->isNewRecord){ ?>
		<?php echo $form->labelEx($model,'rut'); ?><br>
		<?php echo $form->textField($model,'rut', array('blur'=>'dv(event)', 'autofocus'=>'', 'tabindex'=>'1', 'maxlength'=>8)); ?> - <?php echo $form->textField($model,'dv',array('size'=>1,'maxlength'=>1, 'readonly'=>'readonly', 'tabindex'=>'0')); ?><br>
		<span>Rut: 12911963 (Sin puntos, ni guiones ni digito verificador)</span>
		<?php echo $form->error($model,'rut'); ?>
		<?PHP }else{
			echo $form->hiddenField($model, 'rut');
			echo $form->hiddenField($model, 'dv');
		} ?>
	</div>
	<br>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?><br>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45, 'tabindex'=>'2')); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'apellido'); ?><br>
		<?php echo $form->textField($model,'apellido',array('size'=>45,'maxlength'=>45, 'tabindex'=>'3')); ?>
		<?php echo $form->error($model,'apellido'); ?>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'id_regiones'); ?><br>
		<?php echo $form->dropDownList($model,'id_regiones', Chtml::listData(
			Regiones::model()->findAll(),
				'id_regiones', 
				'nombre'
		), array('empty'=>'Elija Región', 'tabindex'=>'4')); ?>

		<?php echo $form->error($model,'id_regiones'); ?>
	</div>
	<br>
	<div class="row" id="comuna">
		<?php echo $form->labelEx($model,'id_comunas'); ?><br>
		<?php echo $form->dropDownList($model,'id_comunas', Chtml::listData(
			Comunas::model()->findAll(),
				'id_comunas', 
				'nombre'
		), array('tabindex'=>'5')); ?>
		<?php echo $form->error($model,'id_comunas'); ?>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?><br>
		<?php echo $form->textField($model,'direccion',array('size'=>45,'maxlength'=>45, 'tabindex'=>'6')); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?><br>
		<?php echo $form->textField($model,'telefono', array('tabindex'=>'7')); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>
	<br>
	<?PHP if($dato){ ?>
	<div class="row">
		<?PHP echo $form->labelEx(Venta::model(), 'descripcion') ?><br>
		<?PHP echo $form->textArea(Venta::model(), 'descripcion', array('class'=>'contact-message', 'tabindex'=>'8')); ?>
		<?PHP echo $form->error(Venta::model(), 'descripcion'); ?>
	</div>
	<?PHP } ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($dato ? 'Comprar' : 'Actualizar', array('class'=>'submit btn-medium style-color', 'tabindex'=>'9')); ?>
	</div>

<?php $this->endWidget(); ?>
</fieldset>

<script type="text/javascript">
	
	$('#Persona_rut').on('blur', function(){
		T = $(this).val();
		var M=0,S=1;
		for(;T;T=Math.floor(T/10))
			S=(S+T%10*(9-M++%6))%11;
		$('#Persona_dv').val(S?S-1:'k');
	});

	$('#Persona_id_regiones').on('change', function(){
		console.log($(this).val());
	})
	//$('#comuna').load('');
	
</script>