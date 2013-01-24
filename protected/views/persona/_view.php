<?php
/* @var $this PersonaController */
/* @var $data Persona */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rut), array('view', 'id'=>$data->rut)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dv')); ?>:</b>
	<?php echo CHtml::encode($data->dv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellido')); ?>:</b>
	<?php echo CHtml::encode($data->apellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_regiones')); ?>:</b>
	<?php echo CHtml::encode($data->id_regiones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_comunas')); ?>:</b>
	<?php echo CHtml::encode($data->id_comunas); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	*/ ?>

</div>