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
		<h1>Detalle</h1>
		<fieldset>
			<legend>Detalle por año</legend>
			<form action="" method="post">
			<table style="width:100%">
				<thead>
					<th>&nbsp;</th>
					<th>Año</th>
				</thead>
				<tbody>
					<?PHP foreach ($anio as $a) { ?>
					<tr>
						<td><input type="checkbox" value="<?PHP echo $a->an ?>" name="ano"></td>
						<td><h3><?php echo CHtml::link($a->an.' Detalle', array('venta/anio/'.$a->an), array('optionName'=>'optionValue')); ?></h3>
		</td>
					</tr>
					<?PHP } ?>
				</tbody>
			</table>
			<input class="button" type="submit" name="yt0" value="Comparar">
			</form>
		</fieldset>

	</article>
</section>