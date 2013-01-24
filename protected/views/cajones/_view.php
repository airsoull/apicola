<?php
/* @var $this CajonesController */
/* @var $data Cajones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_barra')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_barra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad_marcos')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad_marcos); ?>
	<br />


</div>