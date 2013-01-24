<?php
/* @var $this ProductoController */
/* @var $model Producto */
/*
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Create',
);
*/
$this->renderPartial('_menu');

?>
<section id="main" class="grid_9 push_3">
	<article id="dashboard">
<h1>Detalle <?PHP echo $this->dato($tipo, $id); ?></h1>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Detalle General</a></li>
		<li><a href="#tabs-2">Detalle Por Producto</a></li>
		<li><a href="#tabs-3">Detalle Por Región</a></li>
	</ul>
	<div id="tabs-1">
		<table style="width:100%">
    <thead>
        <tr>
            <th>Rut</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
    	<?PHP foreach ($anio as $a) { ?>
        <tr>
            <td><strong><?php echo CHtml::link($a->rut, 'javascript:void(0)', array('class'=>'rut', 'title'=>$a->rut)); ?></strong</td>
            <td><?PHP echo $this->fecha($a->fecha); ?></td>
            <td><?PHP echo $this->precio($a->total); ?></td>
            <td><strong><?php echo CHtml::link('Detalle', 'javascript:void(0)', array('class'=>'deta', 'idd'=>$a->id_venta)); ?></strong></td>
        </tr>
        <?PHP } ?>
    </tbody>
</table>
	</div>
	<div id="tabs-2">
		<?PHP $this->renderPartial('../producto/_producto', array('anio'=>$anio, 'productos'=>$productos)); ?>
	</div>
	<div id="tabs-3">
		<?PHP $this->renderPartial('_regiones', array('region'=>$region)); ?>
	</div>
</div>

<div id="usr" style="display:none" title="Datos De La Persona"></div>
<div id="det" style="display:none" title="Detalle De La Compra"></div>
</article>
</section>

<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>

<script type="text/javascript">

	var $usr = $('#usr');
	$('.rut').on('click', function(){
		$usr.html('');
		var $rut = $(this).attr('title');
		$usr.load("<?PHP echo Yii::app()->request->baseUrl ?>/persona/datos/"+$rut);
		$('#usr').dialog({
			width: 500,
			height: 300,
		});
	});

	var $det = $('#det');
	$('.deta').on('click', function(){
		$det.html('');
		var $idd = $(this).attr('idd');
		$det.load("<?PHP echo Yii::app()->request->baseUrl ?>/venta/detalleu/"+$idd);
		$det.dialog({
			width: 600,
			height: 400,
		});
	});
</script>