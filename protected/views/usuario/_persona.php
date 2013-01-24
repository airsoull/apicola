<fieldset>
	<legend>Persona</legend>
	<?PHP if($con){ ?>
		Nombre:&nbsp;<?PHP echo ucwords($persona->nombre.' '.$persona->apellido); ?><br>
		Rut:&nbsp;<?PHP echo str_replace(',', '.', number_format($persona->rut)).'-'.$persona->dv; ?><br>
		Teléfono:&nbsp;<?PHP echo $persona->telefono; ?><br>
		Región:&nbsp;<?PHP echo $persona->idRegiones->nombre; ?><br>
		Comuna:&nbsp;<?PHP echo ucwords(strtolower($persona->idComunas->nombre)); ?><br>
		Dirección:&nbsp;<?PHP echo ucwords($persona->direccion); ?><br><br>
		<?PHP if($ventas > 0){ ?>
	<?php echo CHtml::link('Ver Compras Realizadas ('.$ventas.')', array('/usuario/compras/'.$persona->id_usuario), array('class'=>'compra')); ?>
		<?PHP }else{ echo "Usuario Sin Compras Realizadas"; } ?>
	<?PHP }else{ ?>
		<h1>No Hay Datos Disponibles</h1>
	<?PHP } ?>
</fieldset>