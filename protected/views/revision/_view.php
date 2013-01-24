<?php
/* @var $this RevisionController */
/* @var $data Revision */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cajones')); ?>:</b>
	<?php echo CHtml::encode($data->idCajones->codigo_barra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_revision')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_revision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_estado')); ?>:</b>
	<?php echo CHtml::encode($data->idEstado->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_comunas')); ?>:</b>
	<?php echo CHtml::encode($data->idComunas->nombre); ?>
	<br />


</div>