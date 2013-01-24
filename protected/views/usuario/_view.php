<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mail')); ?>:</b>
	<?php echo CHtml::encode($data->mail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->idTipo->nombre); ?>
	<br /><br>
	<?php echo CHtml::link('Datos Básicos', array('/usuario/persona/'.$data->id_usuario), array('class'=>'persona')); ?>

</div>