<fieldset>
	<legend>Detalle de la compra</legend>
	<table style="width:100%">
		<thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
    	<?PHP $total = 0;
    	foreach ($model as $m) { 
    		$total = $total + $m->total;
    	?>
    	<tr>
    		<td align="center"><?PHP echo $m->idProducto->nombre; ?></td>
    		<td align="center"><?PHP echo $m->cantidad; ?></td>
    		<td align="center"><?PHP echo '$'.number_format($m->total); ?></td>
    	</tr>
    	<?PHP } ?>
    	<tr>
    		<td align="right" colspan="3">Total:&nbsp;<?PHP echo '$'.number_format($total); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    	</tr>
    </tbody>
	</table>
</fieldset>

<fieldset>
	<legend>Envio y Descripción</legend>
<?PHP echo 'Región: '.$venta->idRegiones->nombre; ?><br>
<?PHP echo 'Comuna: '.ucwords(strtolower($venta->idComunas->nombre)); ?><br><br>
<?PHP echo 'Descripción: '.CHtml::encode($venta->descripcion == Null ? 'No Se Encuentra Descripción' : $venta->descripcion); ?>
</fieldset>