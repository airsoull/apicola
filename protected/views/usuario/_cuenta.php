<section id="page-title">
	<h1>Datos Personales</h1>
</section>
<fieldset>
	<legend>&nbsp;Datos usuario&nbsp;</legend>
Usuario:&nbsp;<strong><?PHP echo $model->usuario; ?></strong><br>
Contraseña:&nbsp;******&nbsp;&nbsp;&nbsp;&nbsp;<?php echo CHtml::link('Modificar Contraseña', array('/usuario/pass'), array('optionName'=>'optionValue')); ?><br>
Mail:&nbsp;<strong><?PHP echo $model->mail ?></strong>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo CHtml::link('Modificar Mail', array('/usuario/mail'), array('optionName'=>'optionValue')); ?>

</fieldset>

<fieldset>
	<legend>&nbsp;Datos Personales&nbsp;</legend>
	<?PHP 
	if($contarPersona == 0){
		echo CHtml::link('Ingresar Datos Personales', array('/usuario/datos'), array('optionName'=>'optionValue'));
	}else{
		?>
		Nombre:&nbsp;<?PHP echo ucwords($persona->nombre.' '.$persona->apellido); ?><br>
		Rut:&nbsp;<?PHP echo str_replace(',', '.', number_format($persona->rut)).'-'.$persona->dv; ?><br>
		Teléfono:&nbsp;<?PHP echo $persona->telefono; ?><br>
		Región:&nbsp;<?PHP echo $persona->idRegiones->nombre; ?><br>
		Comuna:&nbsp;<?PHP echo ucwords(strtolower($persona->idComunas->nombre)); ?><br>
		Dirección:&nbsp;<?PHP echo ucwords($persona->direccion); ?><br><br>
		<?PHP
		echo CHtml::link('Actualizar Datos', array('/usuario/datos'), array('optionName'=>'optionValue'));
	}
	?>
</fieldset>

<fieldset>
	<legend>&nbsp;Compras&nbsp;</legend>
	<?PHP 
	if($contarVenta == 0){
		echo 'No se encuentras compras realizadas';
	}else{
		?>
		Compras totales:&nbsp;<?PHP echo $ventaTotal; ?><br><br>
		<?PHP foreach ($venta as $v) { ?>
			<?php echo CHtml::link('DETALLE', 'javascript:void(0)', array('idv'=>$v->id_venta, 'class'=>'detalle')); ?>
			&nbsp;&nbsp;&nbsp;<?PHP $date = strtotime($v->fecha); echo date("d/m/y H:i", $date); ?>
			&nbsp;&nbsp;&nbsp;Total:&nbsp;<?PHP echo '$'.number_format($v->total); ?>
			<hr style="border:1px solid;width:80%">
			<div class="detalle<?PHP echo $v->id_venta ?>" title="Total: <?PHP echo '$'.number_format($v->total); ?>&nbsp;&nbsp;<?PHP $date = strtotime($v->fecha); echo date("d/m/y H:i", $date); ?>" style="display:none">
			</div>
			<br>
		<?PHP } ?>
		<?PHP
	}
	?>
</fieldset>
<div style="display:none" id="dialog">hola</div>
<script type="text/javascript">
	$('.detalle').on('click', function(){
		var $idv = $(this).attr('idv');
		$('.detalle'+$idv).load("<?PHP echo Yii::app()->request->baseUrl ?>/usuario/detalle/"+$idv);
		$('.detalle'+$idv).dialog({
			width: 600,
			height: 400,
		});
	});
</script>