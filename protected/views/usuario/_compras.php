<?php
/* @var $this UsuarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuarios',
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Administrar Usuario', 'url'=>array('admin')),
);
?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Usuario <?PHP echo $usuario->usuario; ?></h1>

<fieldset>
	<legend>Datos Del Usuario</legend>
	Usuario:&nbsp;<strong><?PHP echo $usuario->usuario; ?></strong><br>
	Mail:&nbsp;<strong><?PHP echo $usuario->mail ?></strong><br>
	IP: <?php echo CHtml::link('Ver IP', array('/usuario/ip/'.$usuario->id_usuario), array('class'=>'ip')); ?>
</fieldset>

<fieldset>
	<legend>Datos Personales</legend>
		Nombre:&nbsp;<?PHP echo ucwords($persona->nombre.' '.$persona->apellido); ?><br>
		Rut:&nbsp;<?PHP echo str_replace(',', '.', number_format($persona->rut)).'-'.$persona->dv; ?><br>
		Teléfono:&nbsp;<?PHP echo $persona->telefono; ?><br>
		Región:&nbsp;<?PHP echo $persona->idRegiones->nombre; ?><br>
		Comuna:&nbsp;<?PHP echo ucwords(strtolower($persona->idComunas->nombre)); ?><br>
		Dirección:&nbsp;<?PHP echo ucwords($persona->direccion); ?>
</fieldset>

<fieldset>
	<legend>Compras Realizadas</legend>
	<?PHP foreach ($venta as $v) { ?>
			<?php echo CHtml::link('DETALLE', array('/usuario/detallecompra/'.$v->id_venta), array('class'=>'detalle')); ?>
			&nbsp;&nbsp;&nbsp;<?PHP $date = strtotime($v->fecha); echo date("d/m/y H:i", $date); ?>
			&nbsp;&nbsp;&nbsp;Total:&nbsp;<?PHP echo '$'.number_format($v->total); ?>
			<br>
		<?PHP } ?>
</fieldset>
<div id="carga" title="Detalle Compra" style="display:none"></div>
<div id="cargas" title="IP Usario" style="display:none"></div>
<script type="text/javascript">
	$('.detalle').on('click', function(){
		$href = $(this).attr('href');
		$('#carga').load($href);
		$('#carga').dialog({
			width: 600,
			height: 400,
		});
		return false;
	});

	$('.ip').on('click', function(){
		$href = $(this).attr('href');
		$('#cargas').load($href);
		$('#cargas').dialog({
			width: 600,
			height: 400,
		});
		return false;
	});
</script>
</article>
</section>
