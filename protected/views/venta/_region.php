<?php
/* @var $this VentaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ventas',
);

$this->renderPartial('_menu');
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
		<h1>Detalle Por Regiones</h1>
		<fieldset>
			<legend>Detalle por año</legend>
			<?PHP foreach ($anio as $a) { ?>
		<h2><?php echo CHtml::link($a->an.' Detalles', array('venta/anior/'.$a->an), array('optionName'=>'optionValue')); ?></h2>
		<?PHP } ?>

		</fieldset>

	</article>
</section>