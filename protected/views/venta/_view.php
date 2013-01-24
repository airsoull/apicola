<?php
/* @var $this VentaController */
/* @var $data Venta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_venta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_venta), array('view', 'id'=>$data->id_venta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut')); ?>:</b>
	<?php echo CHtml::encode($data->rut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_regiones')); ?>:</b>
	<?php echo CHtml::encode($data->id_regiones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_comunas')); ?>:</b>
	<?php echo CHtml::encode($data->id_comunas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />


</div>