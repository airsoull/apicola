<?php
/* @var $this MovimientosController */
/* @var $data Movimientos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cajones')); ?>:</b>
	<?php echo CHtml::encode($data->idCajones->codigo_barra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_movimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_movimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gps_altitud')); ?>:</b>
	<?php echo CHtml::encode($data->gps_altitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gps_longitud')); ?>:</b>
	<?php echo CHtml::encode($data->gps_longitud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gps_altura')); ?>:</b>
	<?php echo CHtml::encode($data->gps_altura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('origen')); ?>:</b>
	<?php echo CHtml::encode($data->origen0->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destino')); ?>:</b>
	<?php echo CHtml::encode($data->destino0->nombre); ?>
	<br />
	<?php echo CHtml::link('REVISAR MAPA', array('/movimientos/mapa/altitud/'.$data->gps_altitud.'/longitud/'.$data->gps_longitud.'/altura/'.$data->gps_altura), array('class'=>'mapa')); ?>
</div>
