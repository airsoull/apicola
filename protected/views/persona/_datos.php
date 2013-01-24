<fieldset>
	<legend><?PHP echo str_replace(',', '.', number_format($model->rut)).'-'.$model->dv; ?></legend>
Rut:&nbsp;<?PHP echo str_replace(',', '.', number_format($model->rut)).'-'.$model->dv; ?><br>
Nombre:&nbsp;<?PHP echo ucwords($model->nombre.' '.$model->apellido); ?><br>
Usuario:&nbsp;<?PHP echo $model->idUsuario->usuario; ?><br>
Mail:&nbsp;<?PHP echo $model->idUsuario->mail; ?><br>
Fecha de Ingreso:&nbsp;<?PHP $date = strtotime($model->idUsuario->fecha_ingreso); echo date("d/m/y H:i", $date); ?><br>
</fieldset>