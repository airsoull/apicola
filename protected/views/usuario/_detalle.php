<table>
	<thead>
		<tr>
			<th>Producto</th>
			<th>Cantidad</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		<?PHP
	foreach($model as $m){
		$id = $m->id_venta;
	?>
		<tr>
			<td><?php echo CHtml::link($m->idProducto->nombre, array('/productos/'.$m->id_producto), array('style'=>'color:orange')); ?></td>
			<td><?PHP echo $m->cantidad; ?></td>
			<td><?PHP echo '$'.number_format($m->total); ?></td>
		</tr>
		<?PHP } ?>
		<tr>
			<td colspan="2">Total:</td>
			<td><?PHP echo '$'.number_format($ventas->total); ?></td>
		</tr>
	</tbody>
</table>
<br><br>
<fieldset style="width:90%">
	<legend>&nbsp;Datos Generales&nbsp;</legend>
	Descripción:&nbsp;<?php echo CHtml::encode($ventas->descripcion != Null ? $ventas->descripcion : "No se encuentra descripción"); ?><br><br>
	Región: <?PHP echo $ventas->idRegiones->nombre; ?><br>
	Comuna: <?PHP echo ucwords(strtolower($ventas->idComunas->nombre)); ?>
</fieldset>